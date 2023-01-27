<?php

namespace App\Scoping\Scopes;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class AuthorScope implements Scope
{
    public function apply(Builder $builder, $value)
    {
        if ($value == '') {
            return;
        }

        return $builder->whereHas('user', function ($builder) use ($value) {
            $builder->where('id', $value);
        });
    }
}
