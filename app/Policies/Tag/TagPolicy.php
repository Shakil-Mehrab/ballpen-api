<?php

namespace App\Policies\Tag;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function update(User $user, Tag $tag)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Tag $tag)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }
}
