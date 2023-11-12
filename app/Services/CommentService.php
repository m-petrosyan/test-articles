<?php

namespace App\Services;

class CommentService
{
    /**
     * @param  object  $article
     * @param  array  $attributes
     * @return object
     */
    public function store(object $article, array $attributes): object
    {
        return $article->comments()->create($attributes + ['user_id' => auth()->id()]);
    }
}
