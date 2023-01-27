<?php

namespace App\Policies\Playlist;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlaylistPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function update(User $user, Playlist $playlist)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Playlist $playlist)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }
}
