<?php

namespace App\Services;

class CommentService
{
    /**
     * @param  object  $article
     * @param  array  $attributes
     * @return void
     */
    public function store(object $article, array $attributes): void
    {
//        dd($attributes + ['user_id' => auth()->id()]);
        $article->comments()->create($attributes + ['user_id' => auth()->id()]);
    }
}
