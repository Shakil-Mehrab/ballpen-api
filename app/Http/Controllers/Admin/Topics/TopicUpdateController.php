<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Topic\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TopicUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Topic $topic, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Topic::class, 'name')->ignore($topic->id)],
        ]);

        $topic->update([
            'name' => $request->name,
            'order' => $request->order ?? null,
        ]);

        return new TopicResource($topic);
    }
}
