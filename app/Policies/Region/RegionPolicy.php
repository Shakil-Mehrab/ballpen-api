<?php

namespace App\Policies\Region;

use App\Models\Region;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function update(User $user, Region $region)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Region $region)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }
}
