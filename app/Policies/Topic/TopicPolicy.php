<?php

namespace App\Policies\Topic;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function update(User $user, Topic $topic)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Topic $topic)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }
}
