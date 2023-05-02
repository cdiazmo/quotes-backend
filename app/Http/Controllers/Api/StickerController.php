<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilesResource;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StickerController extends Controller
{
    public function __invoke()
    {
        $templateFiles = Media::where('collection_name', User::STICKERS_COLLECTION)->paginate(40);
        return FilesResource::collection($templateFiles);
    }
}
