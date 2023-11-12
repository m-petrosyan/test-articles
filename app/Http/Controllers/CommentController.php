<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Models\Article;
use App\Services\CommentService;

class CommentController extends Controller
{
    public CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentCreateRequest $request, Article $article)
    {
        $this->commentService->store($article, $request->validated());

        return redirect()->back();
    }

}
