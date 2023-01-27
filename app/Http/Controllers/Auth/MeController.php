<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserIndexResource;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct(protected StatefulGuard $guard)
    {
        $this->middleware('auth:sanctum');
    }

    public function me(Request $request)
    {
        return new UserIndexResource($request->user());
    }
}
