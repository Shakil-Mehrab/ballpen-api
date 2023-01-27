<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Topic\TopicResource;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TopicStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Topic::class, 'name')],
            'slug' => ['required', 'string', 'max:255', Rule::unique(Topic::class, 'slug')],
        ]);

        $topic = $request->user()->topics()->create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return new TopicResource($topic);
    }
}
