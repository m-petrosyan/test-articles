<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = ArticleRepository::getList();

        $tags = TagRepository::getAll();

        return view('article.index', compact('articles', 'tags'));
    }


    /**
     * @param  Article  $article
     * @return RedirectResponse
     */
    public function likeToggle(Article $article): RedirectResponse
    {
        $article->likes()->toggle(auth()->id());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = $this->articleService->show($article);

        return view('article.show', compact('article'));
    }
}
