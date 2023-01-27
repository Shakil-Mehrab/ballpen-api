<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Topic\TopicResource;
use App\Models\Topic;

class TopicShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Topic $topic)
    {
        return new TopicResource($topic);
    }
}
