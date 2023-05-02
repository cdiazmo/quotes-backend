<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function __invoke()
    {
        $authors = Author::paginate(100);

        return AuthorResource::collection($authors);
    }
}
