<?php

namespace App\Http\Controllers;

use App\Services\FilePondService;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FilepondController extends Controller
{
    public function fileUpload(Request $request)
    {
        $name = array_key_first($request->all());
        $file = $request->file($name)[0];

        $path = $file->store('temp');

        return $response = FilePondService::filePondObjectFromUploadedFile($file, $file->hashName());
    }

    public function delete(Media $media)
    {
        $media->delete();

        toastr()->success('File deleted successfully.');

        return back();
    }
}
