<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Articles\ArticleIndexResource;
use App\Http\Resources\Api\Articles\ArticleResource;
use App\Models\Article;
use App\Scoping\Scopes\AuthorScope;
use App\Scoping\Scopes\CategoryScope;
use App\Scoping\Scopes\RegionScope;
use App\Scoping\Scopes\TagScope;
use App\Scoping\Scopes\TopicScope;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $articles = Article::query()
            ->select('id','uuid','slug','title','kicker','teaser','thumbnail_id','created_at')
            ->with('categories:name', 'thumbnail')
            ->withScopes(
                $this->scopes()
            )
            ->published()
            ->latest('id')
            ->paginate(request('per-page', 10));

        return ArticleIndexResource::collection($articles);
    }

    /**
     * show
     *
     * @param  mixed  $article
     * @return void
     */
    public function show(Article $article)
    {
        $article->load(['categories', 'regions', 'thumbnail', 'user', 'topics', 'tags', 'meta']);

        return new ArticleResource($article);
    }

    /**
     * related
     *
     * @return void
     */
    public function related(Article $article, Request $request)
    {
        $category = $article->categories->pluck('slug');
        $kicker = $article->kicker;

        $relateds = Article::query()
            ->published()
            ->with('categories', 'thumbnail')
            ->whereNotIn('id', (array) $article->id)
            ->whereHas('categories', function ($query) use ($category) {
                $query->whereIn('slug', $category);
            })
            ->when($kicker, function ($query, $kicker) {
                $query->orWhere('kicker', $kicker);
            })
            ->withScopes(
                $this->scopes()
            )
            ->latest('id')
            ->paginate($request->get('per-page', 12));

        return ArticleIndexResource::collection($relateds);
    }

    /**
     * scopes
     *
     * @return void
     */
    protected function scopes()
    {
        return [
            'categories' => new CategoryScope(),
            'topics' => new TopicScope(),
            'regions' => new RegionScope(),
            'tags' => new TagScope(),
            'author' => new AuthorScope(),
        ];
    }
}
