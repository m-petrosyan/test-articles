<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Like\LikeResource;
use App\Models\Article;
use App\Services\LikeService;

class LikeController
{
    public LikeService $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function likeToggle(Article $article)
    {
        return new LikeResource($this->likeService->toggle($article));
    }
}
