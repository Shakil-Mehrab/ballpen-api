<?php

namespace App\Traits;

use App\Models\Meta;

trait HasMetable
{
    public function meta()
    {
        return $this->morphOne(Meta::class, 'metable');
    }
}
