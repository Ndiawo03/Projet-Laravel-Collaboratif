<?php

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// ==========================================
// ROUTES CITATIONS (Ndiawo)
// ==========================================
Route::get('/quotes/search/{keyword}', [QuoteController::class, 'search']);
Route::get('/quotes/random', [QuoteController::class, 'random']);
Route::get('/categories/quotes', [QuoteController::class, 'categories']);
Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/quotes/{id}', [QuoteController::class, 'show']);
Route::post('/quotes', [QuoteController::class, 'store']);
Route::put('/quotes/{id}', [QuoteController::class, 'update']);
Route::delete('/quotes/{id}', [QuoteController::class, 'destroy']);

// ==========================================
// ROUTES POSTS (Alpha)
// ==========================================
Route::get('posts/search/{keyword}', [PostController::class, 'search']);
Route::get('posts/stats', [PostController::class, 'stats']);
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show'])->whereNumber('id');
Route::post('posts', [PostController::class, 'store']);
Route::put('posts/{id}', [PostController::class, 'update'])->whereNumber('id');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->whereNumber('id');

// ==========================================
// ROUTES PRODUCTS (Thiané)
// ==========================================
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/search/{keyword}', [ProductController::class, 'search']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
