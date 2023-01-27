<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keywords = $request->keywords;

        $tags = Tag::query()
            ->when($keywords, function ($query, $keywords) {
                $query
                    ->where('name', 'like', '%'.$keywords.'%')
                    ->orWhere('slug', 'like', '%'.$keywords.'%');
            })
            ->latest()
           ->cursorPaginate($request->get('per-page', 24));

        return TagResource::collection($tags);
    }

    /**
     * show
     *
     * @param  mixed  $tag
     * @return void
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }
}
