<?php

namespace App\Http\Controllers\Auth;

use App\Future\Auth\User\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserResource;
use Illuminate\Http\Request;

class ProfileInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(
        Request $request,
        UpdateUserProfileInformation $updater
    ) {
        // return ($request->thumb);
        // return $request->all();
        $updater->update($request->user(), $request->all());

        return new UserResource($request->user());
    }
}
