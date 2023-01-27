<?php

namespace App\Future\Auth\User;

use App\Future\Auth\Contracts\UpdateProfilePhotos;
use Illuminate\Support\Facades\Validator;

class UpdateProfilePhoto implements UpdateProfilePhotos
{
    public function update($user, array $input)
    {
        Validator::make($input, [
            'bio' => ['required', 'string'],
        ])->validate();

        $user->update([
            'bio' => $input['bio'] ?? null,
        ]);

        if (request()->hasFile('thumb')) {
            $user->updateProfilePhoto($input['thumb']);
        }

        return $user;
    }
}
