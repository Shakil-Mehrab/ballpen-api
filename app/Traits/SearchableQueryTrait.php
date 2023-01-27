<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchableQueryTrait
{
    public function scopeArticleSerching(Builder $builder, $search)
    {
        return $builder->when($search, function ($q) use ($search) {
            $q->where('id', 'like', '%'.$search.'%')
            // ->orWhere('uuid','like','%'.$search.'%')//index kora nei.vai bolche pore korte
            ->orWhere('title', 'like', '%'.$search.'%')
            ->orWhere('slug', 'like', '%'.$search.'%');
        });
    }

    public function scopeUserSerching(Builder $builder, $search)
    {
        return $builder->when($search, function ($q) use ($search) {
            $q->where('id', 'like', '%'.$search.'%')
            // ->orWhere('uuid','like','%'.$search.'%')//no index
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%');
            // ->orWhere('display_name','like','%'.$search.'%');//no index
        });
    }

    public function scopeArticleByDate(Builder $builder, $from, $to)
    {
        if ($from && $to) {
            return $builder->whereBetween('created_at', [$from, $to])->orWhere('created_at', 'like', '%'.$to.'%');
        }

        if ($from && ! $to) {
            return $builder->where('created_at', 'like', '%'.$from.'%');
        }
        if (! $from && $to) {
            return $builder->where('created_at', 'like', '%'.$to.'%');
        }
    }
}
