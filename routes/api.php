<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Module Citations
|--------------------------------------------------------------------------
|
| Routes pour le module de gestion des citations
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Quote routes
Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/quotes/search', [QuoteController::class, 'search']);
Route::get('/quotes/random', [QuoteController::class, 'random']);
Route::get('/quotes/{id}', [QuoteController::class, 'show']);
Route::post('/quotes', [QuoteController::class, 'store']);
Route::put('/quotes/{id}', [QuoteController::class, 'update']);
Route::delete('/quotes/{id}', [QuoteController::class, 'destroy']);
Route::get('/categories/quotes', [QuoteController::class, 'categories']);

// Route de test simple
Route::post('/test-quote', function(Request $request) {
    return response()->json([
        'message' => 'Test reçu',
        'data' => $request->all()
    ]);
});
