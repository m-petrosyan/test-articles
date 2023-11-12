<?php

namespace App\Interfaces;

interface ArticleInterface
{
    public static function getList();

    public static function getWithRelations(object $article);
}
