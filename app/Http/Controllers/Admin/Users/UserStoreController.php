<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(User::class, 'name')],
            'slug' => ['required', 'string', 'max:255', Rule::unique(User::class, 'slug')],
        ]);

        $user = User::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return new UserResource($user);
    }
}
