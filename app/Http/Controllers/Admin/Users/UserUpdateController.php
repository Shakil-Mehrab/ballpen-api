<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(User $user, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(User::class, 'name')->ignore($user->id)],
        ]);

        $user->update([
            'name' => $request->name,
            'order' => $request->order ?? null,
        ]);

        return new UserResource($user);
    }
}
