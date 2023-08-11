<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = Article::all();

        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = ArticleCategory::all();

        return view('article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $request->validated();

        $data = $request->validated();

        $data['active'] = $request->input('active')=='on' ? 1:0;

        if(isset($data['image'])){
            $data['image'] = $request->file('image')->store('uploads','public');
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Успешно добавлен');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();

        return view('article.edit',compact(['article','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(\App\Http\Requests\ArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        if(isset($data['image'])){
            $data['image'] = $request->file('image')->store('uploads','public');
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            $absolutePath = public_path('storage/'.$article->image);
            File::delete($absolutePath);
        }
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Успешно удален');
    }
}
