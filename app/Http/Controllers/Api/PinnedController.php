<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Articles\ArticleIndexResource;
use App\Models\Pin;
use Illuminate\Http\Request;

class PinnedController extends Controller
{
    public function index(Request $request)
    {
        $pinned = Pin::query()
            ->with([
                'article' => fn ($q) => $q->published(),
                'article' => [
                    'categories',
                    'thumbnail',
                ],
            ])
            ->limit($request->get('paginate', 9))
            ->get()
            ->filter();

        $pinnedArticles = $pinned->map(function ($item) {
            if (! $item->article_id) {
                return;
            }

            return $item->article;
        });

        return ArticleIndexResource::collection($pinnedArticles->filter());
    }
}
