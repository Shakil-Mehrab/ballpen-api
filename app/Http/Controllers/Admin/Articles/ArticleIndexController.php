<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Articles\ArticleIndexResource;
use App\Models\Article;
use App\Scoping\Scopes\AuthorScope;
use App\Scoping\Scopes\CategoryScope;
use App\Scoping\Scopes\RegionScope;
use App\Scoping\Scopes\TagScope;
use App\Scoping\Scopes\TopicScope;
use Illuminate\Http\Request;

class ArticleIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $articles = Article::query()
            // ->with('categories', 'regions', 'thumbnail', 'user', 'topics', 'tags', 'meta', 'meta.image')
            // ->with([
            //     'user:id,name',
            // ])
            ->articleSerching($request->get('search'))
            ->articleByDate($request->get('from'), $request->get('to'))
            ->withScopes(
                $this->scopes()
            )
            ->latest('id')
            ->paginate($request->get('per-page', 10));

        return ArticleIndexResource::collection($articles);
    }

    protected function scopes(): array
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
