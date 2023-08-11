<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
         return view('dashboard');
    })->name('dashboard');

    Route::resources([
        'users' => \App\Http\Controllers\UserController::class,
        'article-categories' => \App\Http\Controllers\ArticleCategoryController::class,
        'articles' => \App\Http\Controllers\ArticleController::class
    ]);

    Route::post('ckeditor/upload', [\App\Http\Controllers\CKEditorController::class,'upload'])->name('ckeditor.image-upload');
});

require __DIR__.'/auth.php';
