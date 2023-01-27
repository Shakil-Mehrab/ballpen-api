<?php

namespace App\Policies\Article;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (in_array($user->email, config('admin.emails'))) {
            return true;
        }

        return false;
    }

    public function update(User $user, Article $article)
    {
        if (in_array($user->email, config('admin.emails')) || $user->id === $article->user_id) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Article $article)
    {
        if (in_array($user->email, config('admin.emails')) || $user->id === $article->user_id) {
            return true;
        }

        return false;
    }
}
