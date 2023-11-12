<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    public function store()
    {
    }

    /**
     * @param  object  $article
     * @return object
     */
    public function show(object $article): object
    {
        $article->increment('views');

        return ArticleRepository::getWithRelations($article);
    }
}
