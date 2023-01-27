<?php

namespace App\Http\Controllers\Auth;

use App\Future\Auth\Contracts\UpdateProfilePhotos;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserResource;
use Illuminate\Http\Request;

class ProfilePhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(
        Request $request,
        UpdateProfilePhotos $updater
    ) {
        $updater->update($request->user(), $request->all());

        return new UserResource($request->user());
    }
}
