<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TitleStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TitleController extends Controller
{
    public function index()
    {
        $titles = Media::where('collection_name', User::TITLE_FILES_COLLECTION)->paginate($this->perPage);
        return view('admin.titles.index', compact('titles'));
    }

    public function create()
    {
    }

    public function store(TitleStoreRequest $request)
    {
        auth()->user()->addFiles(User::TITLE_FILES_COLLECTION, $request->title_files, false);

        toastr()->success('Titles uploaded successfully.');

        return to_route('titles.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
