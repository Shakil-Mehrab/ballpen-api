<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Bag\Enums\ArticleStatus;
use App\Bag\Enums\MetaType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Articles\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ArticleUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Article $article, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            // 'slug' => ['required', 'string', 'max:255', Rule::unique(Article::class, 'slug')->ignore($article->id)],
            'kicker' => ['nullable', 'string', 'max:100'],
            'teaser' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['required', 'exists:media,id'],
            'categories' => ['required', 'array'],
            'categories.0' => ['required'],
            'categories.*' => ['nullable', 'exists:categories,id'],
            'topics' => ['nullable', 'array'],
            'topics.*' => ['required', 'exists:topics,id'],
            'regions' => ['nullable', 'array'],
            'regions.*' => ['required', 'exists:regions,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['required', 'exists:tags,id'],
            // 'pinned' => ['required', 'boolean'],
            'status' => [new Enum(ArticleStatus::class)],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_image' => ['required', 'exists:media,id'],
            'meta_description' => ['nullable', 'string'],
            'reporter' => ['nullable', 'string', 'max:255'],

        ]);

        $article->update(
            [
                'title' => $request->title,
                'teaser' => $request->teaser,
                'kicker' => $request->kicker,
                'content' => $request->content,
                'thumbnail_id' => $request->thumbnail,
                'reporter' => $request->reporter ?? null,
                'status' => $request->status,
                'published_at' =>$request->status=='published'? now(): null,
                'publisher_id' => $request->status=='published'? $request->user()->id : null,
            ]
        );

        $article->meta()->update([
            'title' => $request->meta_title,
            'image_id' => $request->meta_image,
            'description' => $request->meta_description,
            'type' => MetaType::ARTICLE,
        ]);

        // if ($request->status == 'published') { // need to fix this
        //     $article->published_at = $article->published_at ?? now();
        //     $article->publisher_id = auth()->user()->id;
        //     $article->update();
        // }

        $article->categories()->sync(array_filter((array) $request->categories));
        $article->topics()->sync(array_filter((array) $request->topics));
        $article->regions()->sync(array_filter((array) $request->regions));
        $article->tags()->sync(array_filter((array) $request->tags));

        return new ArticleResource($article);
    }
}
