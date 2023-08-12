<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCategoryResource;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    // Метод получения всех категорий статей

    public function index(Request $request){
      return ArticleCategoryResource::collection(\App\Models\ArticleCategory::paginate($request->per_page??$request->per_page));
    }
}
