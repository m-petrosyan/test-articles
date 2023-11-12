<?php

namespace App\Repositories;

use App\Interfaces\CommentInterface;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository implements CommentInterface
{
    /**
     * @return Collection
     */
    public static function getAll(): Collection
    {
        return Comment::all();
    }
}
