<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->quote()
            ->paginate(100);

        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
    }

    public function show(Category $category)
    {
    }

    public function update(Request $request, Category $category)
    {
    }

    public function destroy(Category $category)
    {
    }
}
