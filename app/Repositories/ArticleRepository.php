<?php

namespace App\Repositories;

use App\Interfaces\ArticleInterface;
use App\Models\Article;

class ArticleRepository implements ArticleInterface
{
    public static function getList()
    {
        return Article::withCount(['likes'])->orderBy('id', 'desc')->paginate(9);
    }

    public static function getWithRelations(object $article)
    {
        return $article->load(['tags', 'comments.user']);
    }
}
