<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\CategoryTreeResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $selects = $request->selects;

        $categories = Category::query()
            ->when($selects, function($query) use ($selects) {
                $query->whereIn('slug', (array) explode(',', $selects));
            })
            ->orderBy('order', 'asc')
            ->tree()
            ->get()
            ->toTree();

        return CategoryTreeResource::collection($categories);
    }

    /**
     * show
     *
     * @param  mixed  $category
     * @return void
     */
    public function show(Category $category)
    {
        $category->load(['children']);

        return new CategoryTreeResource($category);
    }
}
