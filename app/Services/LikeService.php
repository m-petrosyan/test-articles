<?php

namespace App\Services;

class LikeService
{
    /**
     * @param  object  $article
     * @return object
     */
    public function toggle(object $article): object
    {
        $article->likes()->toggle(auth()->id());

        return $article->loadCount('likes');
    }
}
