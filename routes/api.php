<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/articles', [\App\Http\Controllers\Api\ArticleController::class, 'index']);
Route::get('/articles/{article}', [\App\Http\Controllers\Api\ArticleController::class, 'show']);
Route::get('/articles-by-category/{id}', [\App\Http\Controllers\Api\ArticleController::class, 'byCategoryId']);

Route::get('/article-categories', [\App\Http\Controllers\Api\ArticleCategoryController::class, 'index']);
