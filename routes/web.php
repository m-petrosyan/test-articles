<?php

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

Route::resource('article', ArticleController::class)->only('index', 'create', 'show');

Route::post('/article/liketoggle/{article}', [ArticleController::class, 'likeToggle'])->name('article.liketoggle');

Route::post('comment/{article}', [CommentController::class, 'store'])->name('comment.store');
