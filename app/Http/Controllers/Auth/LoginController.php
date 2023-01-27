<?php

namespace App\Http\Controllers\Auth;

use App\Future\Auth\AttemptToAuthenticate;
use App\Future\Auth\EnsureLoginIsNotThrottled;
use App\Future\Auth\PrepareAuthenticatedSession;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Admin\User\UserResource;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Pipeline;

class LoginController extends Controller
{
    public function __construct(protected StatefulGuard $guard)
    {
        $this->middleware('guest');
    }

    public function __invoke(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return new UserResource($this->guard->user());
        });
    }

    protected function loginPipeline(LoginRequest $request)
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            EnsureLoginIsNotThrottled::class,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }
}
