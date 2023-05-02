<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StickerStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StickerController extends Controller
{
    public function index()
    {
        $stickers = Media::where('collection_name', User::STICKERS_COLLECTION)->paginate($this->perPage);
        return view('admin.stickers.index', compact('stickers'));
    }

    public function create()
    {
    }

    public function store(StickerStoreRequest $request)
    {
        auth()->user()->addFiles(User::STICKERS_COLLECTION, $request->stickers, false);

        toastr()->success('Stickers uploaded successfully.');

        return to_route('stickers.index');
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
