<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;


class ArticleController extends Controller
{
    // Метод получения всех статей

    public function index(Request $request){
        return ArticleResource::collection(Article::paginate($request->per_page?$request->per_page:10));
    }

    // Метод получения статьи по slug

    public function show(Article $article){
        return new ArticleResource($article);
    }

    //  Метод получения статей по заданной категории (указывается id категории)

    public function byCategoryId($id){
        return ArticleResource::collection(\App\Models\Article::where('category_id',$id)->get());
    }
}
