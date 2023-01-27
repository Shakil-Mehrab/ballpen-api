<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Topic\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keywords = $request->keywords;

        $topic = Topic::query()
            ->when($keywords, function ($query, $keywords) {
                $query
                    ->where('name', 'like', '%'.$keywords.'%')
                    ->orWhere('slug', 'like', '%'.$keywords.'%');
            })
            ->latest()
            ->cursorPaginate($request->get('per-page', 24));

        return TopicResource::collection($topic);
    }

    /**
     * show
     *
     * @param  mixed  $topic
     * @return void
     */
    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }
}
