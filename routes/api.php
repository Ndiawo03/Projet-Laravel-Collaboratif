<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Module Accueil
|--------------------------------------------------------------------------
|
| Routes pour le module Page d'accueil et dashboard du Blog API
| Ce module gère la page d'accueil, les statistiques et les informations
| générales de l'API.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// === ROUTES MODULE ACCUEIL ===

// Page d'accueil principale
Route::get('/', [HomeController::class, 'index'])->name('home');

// Statistiques détaillées du dashboard  
Route::get('/stats', [HomeController::class, 'stats'])->name('stats');

// État de santé du système
Route::get('/health', [HomeController::class, 'health'])->name('health');

// Informations sur l'API
Route::get('/info', [HomeController::class, 'info'])->name('info');

// Route de test pour vérifier que l'API fonctionne
Route::get('/ping', function () {
    return response()->json([
        'message' => 'pong',
        'timestamp' => now()->toISOString(),
        'module' => 'accueil'
    ]);
})->name('ping');
