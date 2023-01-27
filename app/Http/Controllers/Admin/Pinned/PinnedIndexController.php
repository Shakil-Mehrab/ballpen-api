<?php

namespace App\Http\Controllers\Admin\Pinned;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Pinned\PinnedIndexResource;
use App\Models\Pin;
use Illuminate\Http\Request;

class PinnedIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $pinned = Pin::query()
            ->with('article', 'article.categories', 'article.regions', 'article.thumbnail', 'article.user', 'article.topics', 'article.tags', 'article.meta', 'article.meta.image')
            ->paginate(request('per-page', 9));

        $pinnedArticles = $pinned->map(function ($item) {
            return $item->article;
        });

        return PinnedIndexResource::collection($pinnedArticles);
    }
}
