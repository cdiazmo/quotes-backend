<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeCategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::homeCategory()->pluck('name', 'id')->toArray();

        return view('admin.home-categories.index', compact('categories'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        toastr()->success('Home Category deleted successfully.');

        return to_route('home-categories.index');
    }

    public function store(HomeCategoryStoreRequest $request)
    {
        $category = Category::find($request->category_id);

        $category->addFiles(Category::HOME_CATEGORY_FILES_COLLECTION, $request->category_files, false);

        toastr()->success('Created successfully.');

        return to_route('home-categories.index');
    }

    public function show(Category $category)
    {
        $homeCategoryImages = $category->getMedia(\App\Models\Category::HOME_CATEGORY_FILES_COLLECTION);

        return view('admin.home-categories.category-images', compact('homeCategoryImages'));
    }
}
