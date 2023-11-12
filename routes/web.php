<?php

use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('homepage');

Route::resource('articles', ArticleController::class)->only('index', 'create', 'show');


Route::middleware('auth:web')->group(function () {
    Route::post('/articles/liketoggle/{article}', [LikeController::class, 'likeToggle']);
    Route::post('/articles/add-view/{article}', [ArticleController::class, 'addView']);
    Route::post('/articles/add-comment/{article}', [CommentController::class, 'store']);
});
