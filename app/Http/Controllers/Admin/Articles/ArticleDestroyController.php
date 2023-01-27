<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleDestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Article $article)
    {
        $article->delete();

        return response()->json(['success' => true], 200);
    }
}
