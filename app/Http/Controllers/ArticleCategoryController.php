<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCategoryRequest;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = ArticleCategory::paginate(10);

        return view('article-category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('article-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleCategoryRequest $request)
    {
        $data = $request->validated();

        $data['active'] = $request->input('active')=='on' ? 1:0;

        ArticleCategory::create($data);

        return redirect()->route('article-categories.index')->with('success', 'Успешно добавлен');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory $articleCategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('article-category.edit',compact('articleCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleCategoryRequest $request
     * @param  \App\Models\ArticleCategory $articleCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleCategoryRequest $request, ArticleCategory $articleCategory)
    {
        $data = $request->validated();

        $articleCategory->update($data);

        return redirect()->route('article-categories.index')->with('success', 'Успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory $articleCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        $articleCategory->delete();

        return redirect()->route('article-categories.index')->with('success', 'Успешно удален');
    }
}
