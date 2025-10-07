<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('posts/stats', [PostController::class, 'stats']);
Route::get('posts/search', [PostController::class, 'search']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show'])->whereNumber('post');
Route::post('posts', [PostController::class, 'store']);
Route::put('posts/{post}', [PostController::class, 'update'])->whereNumber('post');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->whereNumber('post');
