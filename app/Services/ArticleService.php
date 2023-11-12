<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    /**
     * @param  object  $article
     * @return object
     */
    public function updateViews(object $article): object
    {
        $article->increment('views');

        return $article;
    }

    /**
     * @param  object  $article
     * @return object
     */
    public function show(object $article): object
    {
        return ArticleRepository::getWithRelations($article);
    }
}
