<?php

namespace App\Scoping\Scopes;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class TopicScope implements Scope
{
    public function apply(Builder $builder, $value)
    {
        if ($value == '') {
            return;
        }

        return $builder->whereHas('topics', function ($builder) use ($value) {
            $builder->whereIn('slug', explode(',', $value));
        });
    }
}
