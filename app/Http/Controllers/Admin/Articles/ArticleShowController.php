<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Articles\ArticleResource;
use App\Models\Article;

class ArticleShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Article $article)
    {
        $article->load(['categories', 'regions', 'thumbnail', 'user', 'topics', 'tags', 'meta', 'meta.image']);

        return new ArticleResource($article);
    }
}
