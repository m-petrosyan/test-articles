<?php

namespace App\Repositories;

use App\Interfaces\TagInterface;
use App\Models\Tag;

class TagRepository implements TagInterface
{
    public static function getAll()
    {
        return Tag::all();
    }
}
