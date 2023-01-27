<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Tag\TagResource;
use Illuminate\Http\Request;

class TagStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:tags,name'],
            'slug' => ['required', 'string', 'max:255', 'unique:tags,slug'],
        ]);

        $tag = $request->user()->tags()->create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return new TagResource($tag);
    }
}
