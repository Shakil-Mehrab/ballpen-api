<?php

namespace App\Models\Presenters;

use Illuminate\Database\Eloquent\Model;

class UserPresenter
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function name()
    {
        return $this->model?->display_name ?? $this->model->name;
    }

    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return null;
    }
}
