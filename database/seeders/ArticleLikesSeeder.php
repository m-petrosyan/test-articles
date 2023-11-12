<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Product;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        Article::all()->each(function ($article) use ($users) {
            $article->likes()->attach(
                $users->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
