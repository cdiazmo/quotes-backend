<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbaordController;
use App\Http\Controllers\Admin\SplashController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\StickerController;
use App\Http\Controllers\Admin\HomeCategoryController;
use App\Http\Controllers\Admin\TitleController;
use App\Http\Controllers\FilepondController;
use Illuminate\Support\Facades\Route;

//Admin Routes

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', DashbaordController::class)->name('dashboard');
    Route::resource('authors', AuthorController::class);
    Route::resource('quotes', QuoteController::class);
    Route::post('upload-json-quotes', [QuoteController::class, 'uploadJsonQuotes'])->name('upload-json-quotes');
    Route::resource('categories', CategoryController::class);
    Route::resource('home-categories', HomeCategoryController::class)->parameters([
        'home-categories' => 'category'
    ]);
    Route::resource('templates', TemplateController::class);
    Route::resource('stickers', StickerController::class);
    Route::resource('titles', TitleController::class);
    Route::resource('splashes', SplashController::class);
});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/migrate', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
    return "Done";
});

Route::get('/storage-link', function () {
    \Illuminate\Support\Facades\Artisan::call('queue:work');
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return "Storage Link Created Successfully.";
});

Route::get('/run-queue', function () {
    \Illuminate\Support\Facades\Artisan::call('queue:work');
    return "Queue Started Successfully.";
});


require __DIR__ . '/auth.php';

Route::post('file-upload', [FilepondController::class, 'fileUpload']);

Route::delete('file-upload/{media}', [FilepondController::class, 'delete'])->name('delete-file-media');
