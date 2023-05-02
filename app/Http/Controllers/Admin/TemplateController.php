<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TemplateStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Media::where('collection_name', User::TEMPLATE_COLLECTION)->paginate($this->perPage);
        return view('admin.templates.index', compact('templates'));
    }

    public function create()
    {
    }

    public function store(TemplateStoreRequest $request)
    {
        auth()->user()->addFiles(User::TEMPLATE_COLLECTION, $request->templates, false);

        toastr()->success('Templates uploaded successfully.');

        return to_route('templates.index');
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
