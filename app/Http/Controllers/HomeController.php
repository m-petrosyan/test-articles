<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;

class HomeController extends Controller
{
    public function __invoke()
    {
        $articles = ArticleRepository::getList();
        
        return view('homepage', compact('articles'));
    }
}
