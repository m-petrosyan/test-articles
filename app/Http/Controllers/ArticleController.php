<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article\ArticleViewsResource;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Services\ArticleService;

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
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = $this->articleService->show($article);

        return view('article.show', compact('article'));
    }

    public function addView(Article $article)
    {
        return new ArticleViewsResource($this->articleService->updateViews($article));
    }
}
