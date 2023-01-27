<?php

namespace App\Models\Presenters;

use App\Bag\BanglaDatetimeFormatter;
use BanglaDatetimeFormat\Types\DateTime as EnDateTime;
use Illuminate\Database\Eloquent\Model;

class ArticlePresenter
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function reporter()
    {
        return $this->model?->reporter ?? $this->model?->user->present()->name;
    }

    public function formattedDatetime()
    {
        if ($this->model->created_at->diffInDays(now()) >= 1) {
            return (new EnDateTime($this->model->created_at))->formatted('l jS F Y h:i:s A');
        }

        return BanglaDatetimeFormatter::en_human_time_to_bn($this->model->created_at->diffForHumans());
    }

    public function humansDatetime()
    {
        return BanglaDatetimeFormatter::en_human_time_to_bn($this->model->created_at->diffForHumans());
    }

    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return null;
    }
}
