<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Tag $tag, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(Tag::class, 'name')->ignore($tag->id)],
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return $tag;
    }
}
