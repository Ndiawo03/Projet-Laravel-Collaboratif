<?php

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Routes liées aux articles
Route::get('posts/search', [PostController::class, 'search']);
Route::get('posts/stats', [PostController::class, 'stats']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show'])->whereNumber('post');
Route::post('posts', [PostController::class, 'store']);
Route::put('posts/{post}', [PostController::class, 'update'])->whereNumber('post');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->whereNumber('post');




// routes/api.php les routes API pour les produits
use Illuminate\Http\Request;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/products/search/{keyword}', [ProductController::class, 'search']);

