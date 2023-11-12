<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = Article::all();

        Tag::all()->each(function ($tag) use ($article) {
            $tag->article()->attach(
                $article->random(rand(2, 5))->pluck('id')->toArray()
            );
        });
    }
}
