<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Tag\TagResource;
use App\Models\Tag;

class TagIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        $tags = Tag::query()
            ->latest()
            ->paginate(request('per-page', 10));

        return TagResource::collection($tags);
    }
}
