<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserResource;

class UserIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $search=$request->get('search');

        $users =User::with('region')
            ->latest('id')
            ->userSerching($search)
            ->paginate($request->get('per-page', 30));

        return UserResource::collection($users);
    }
}
