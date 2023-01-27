<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Topic\TopicResource;
use App\Models\Topic;

class TopicIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        $topics = Topic::query()
            ->latest()
            ->paginate(request('per-page', 10));

        return TopicResource::collection($topics);
    }
}
