<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SplashStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SplashController extends Controller
{
    public function index()
    {
        $splashes = Media::where('collection_name', User::SPLASH_COLLECTION)->paginate($this->perPage);
        return view('admin.splashes.index', compact('splashes'));
    }

    public function create()
    {
    }

    public function store(SplashStoreRequest $request)
    {
        auth()->user()->addFiles(User::SPLASH_COLLECTION, $request->splash_files, false);

        toastr()->success('Splashes uploaded successfully.');

        return to_route('splashes.index');
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
