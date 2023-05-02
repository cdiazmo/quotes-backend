<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AuthorsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorStoreRequest;
use App\Http\Requests\Admin\AuthorUpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(AuthorsDataTable $dataTable)
    {
        return $dataTable->render('admin.authors.index');
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(AuthorStoreRequest $request)
    {
        Author::create($request->validated());

        toastr()->success('Author created successfully.');

        return to_route('authors.index');
    }

    public function show(Author $author)
    {
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $author->update($request->validated());

        toastr()->success('Author updated successfully.');

        return to_route('authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        toastr()->success('Author deleted successfully.');

        return to_route('authors.index');
    }
}
