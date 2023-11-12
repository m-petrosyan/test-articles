<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Article\ArticleViewsResource;
use App\Models\Article;
use App\Services\ArticleService;

class ArticleController
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function updateViews(Article $article)
    {
        return new ArticleViewsResource($this->articleService->updateViews($article));
    }
}
