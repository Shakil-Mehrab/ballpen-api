<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Category\CategoryResource;
use App\Models\Category;

class CategoryIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        $categories = Category::query()
            ->with(['parent'])
            ->tree()
            ->get()
            ->toTree();

        return CategoryResource::collection($categories);
    }
}
