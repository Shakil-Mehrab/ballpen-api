<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($user, Request $request)
    {
        $user=User::where('uuid',$user)->first();
        $user->load('region');

        return new UserResource($user);
    }
}
