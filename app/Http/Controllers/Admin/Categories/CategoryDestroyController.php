<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryDestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Category $category)
    {
        $category->delete();

        return response()->json(['success' => true], 200);
    }
}
