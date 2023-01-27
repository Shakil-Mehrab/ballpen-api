<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Category\CategoryResource;
use Illuminate\Http\Request;

class CategoryStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);

        $category = $request->user()->categories()->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->get('parent_id', null),
        ]);

        return new CategoryResource(
            $category
        );
    }
}
