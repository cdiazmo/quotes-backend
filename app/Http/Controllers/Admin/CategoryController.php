<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        toastr()->success('Category created successfully.');

        if ($request->type == Category::HOME_TYPE) {
            return to_route('home-categories.index');
        }

        return to_route('categories.index');
    }

    public function show(Category $category)
    {
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category->update($request->validated());

        toastr()->success('Category updated successfully.');

        return to_route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        toastr()->success('Category deleted successfully.');

        return to_route('categories.index');
    }
}
