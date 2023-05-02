<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FilesResource;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->homeCategory()
            ->with(['getTemplateFiles'])
            ->paginate(100);

        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
    }

    public function show(Category $category)
    {
        return FilesResource::collection($category->getTemplateFiles);
    }

    public function update(Request $request, Category $category)
    {
    }

    public function destroy(Category $category)
    {

    }
}
