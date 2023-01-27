<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Category $category, Request $request)
    {
        // return response()->json(['nice'], 200);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique(Category::class, 'name')->ignore($category->id)],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->get('parent_id', null),
        ]);

        return new CategoryResource(
            $category
        );
    }
}
