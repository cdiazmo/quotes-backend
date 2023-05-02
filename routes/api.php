<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\HomeCategoryController;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\SplashController;
use App\Http\Controllers\Api\StickerController;
use App\Http\Controllers\Api\TemplateController;
use App\Http\Controllers\Api\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['has.auth.secret.key']], function () {
    Route::get('authors', AuthorController::class);
    Route::get('quotes', [QuoteController::class, 'index']);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('home-categories', HomeCategoryController::class)->parameters(['home-categories' => 'category']);
    Route::get('templates', TemplateController::class);
    Route::get('stickers', StickerController::class);
    Route::get('titles', TitleController::class);
    Route::get('splashes', SplashController::class);
});

