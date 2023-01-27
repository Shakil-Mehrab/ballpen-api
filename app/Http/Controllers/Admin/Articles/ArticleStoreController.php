<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Models\Article;
use App\Bag\Enums\MetaType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Articles\ArticleResource;

class ArticleStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:articles,slug'],
            'kicker' => ['nullable', 'string', 'max:100'],
            'teaser' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail' => ['required', 'exists:media,id'],
            'categories' => ['required', 'array'],
            'categories.0' => ['required', 'exists:categories,id'],
            'categories.*' => ['nullable', 'exists:categories,id'],
            'topics' => ['nullable', 'array'],
            'topics.*' => ['required', 'exists:topics,id'],
            'regions' => ['nullable', 'array'],
            'regions.*' => ['required', 'exists:regions,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['required', 'exists:tags,id'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_image' => ['required', 'exists:media,id'],
            'meta_description' => ['nullable', 'string'],
            'reporter' => ['nullable', 'string', 'max:255'],

        ]);

        $article = DB::transaction(function () use ($request) {
            return tap(
                $request->user()
                    ->articles()
                    ->create(
                        [
                            'title' => $request->title,
                            'slug' => $request->slug,
                            'teaser' => $request->teaser,
                            'kicker' => $request->kicker,
                            'content' => $request->content,
                            'thumbnail_id' => $request->thumbnail,
                            'reporter' => $request->reporter ?? null,
                            'status' => $request->status,
                            'published_at' =>$request->status=='published'? now(): null,
                            'publisher_id' => $request->status=='published'? $request->user()->id : null,
                        ]
                    ),
                function (Article $article) use ($request) {
                    $article->meta()->create([
                        'title' => $request->meta_title,
                        'image_id' => $request->meta_image,
                        'description' => $request->meta_description,
                        'type' => MetaType::ARTICLE,
                    ]);

                    $article->categories()->sync(array_filter((array) $request->categories));
                    $article->topics()->sync(array_filter((array) $request->topics));
                    $article->regions()->sync(array_filter((array) $request->regions));
                    $article->tags()->sync(array_filter((array) $request->tags));
                }
            );
        });

        return new ArticleResource($article);
    }
}
