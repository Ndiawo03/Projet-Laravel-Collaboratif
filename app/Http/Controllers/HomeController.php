<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource for homepage
     */
    public function index()
    {
        // Simulation de données pour la page d'accueil
        // En production, ces données viendraient des vraies tables
        
        $recentQuotes = $this->getSimulatedQuotes();
        $randomQuote = $this->getRandomSimulatedQuote();
        $categories = $this->getSimulatedCategories();
        
        // Statistiques simulées - en production, elles viendraient de la vraie DB
        $stats = [
            'total_quotes' => 50,
            'total_posts' => 25,
            'total_products' => 100,
            'total_categories' => 15,
            'users_online' => rand(5, 20),
        ];

        return response()->json([
            'message' => 'Bienvenue sur l\'API Blog',
            'version' => '1.0.0',
            'data' => [
                'recent_quotes' => $recentQuotes,
                'random_quote' => $randomQuote,
                'categories' => $categories,
                'stats' => $stats,
                'api_endpoints' => [
                    'quotes' => '/api/quotes',
                    'posts' => '/api/posts',
                    'products' => '/api/products',
                ]
            ]
        ]);
    }

    /**
     * Get dashboard statistics
     */
    public function stats()
    {
        // En production, ces stats viendraient des vraies tables via des jointures
        $stats = [
            'quotes' => [
                'total' => $this->getQuoteCount(),
                'categories' => $this->getQuoteCategoryCount(),
                'recent' => rand(2, 8),
                'popular_category' => 'inspiration'
            ],
            'posts' => [
                'total' => $this->getPostCount(),
                'published' => $this->getPublishedPostCount(),
                'drafts' => rand(3, 10),
                'recent' => rand(1, 5)
            ],
            'products' => [
                'total' => $this->getProductCount(),
                'in_stock' => rand(80, 95),
                'categories' => rand(8, 12),
                'recent' => rand(2, 6)
            ],
            'general' => [
                'users' => rand(100, 500),
                'visitors_today' => rand(50, 200),
                'api_calls_today' => rand(1000, 5000),
                'uptime' => '99.9%'
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $stats,
            'generated_at' => now()->toISOString()
        ]);
    }

    /**
     * Get system health status
     */
    public function health()
    {
        $health = [
            'status' => 'healthy',
            'database' => $this->checkDatabaseConnection(),
            'cache' => 'operational',
            'storage' => 'operational',
            'memory_usage' => rand(40, 70) . '%',
            'disk_usage' => rand(20, 50) . '%',
            'response_time' => rand(50, 150) . 'ms',
            'last_check' => now()->toISOString()
        ];

        return response()->json($health);
    }

    /**
     * Get API information and available endpoints
     */
    public function info()
    {
        $info = [
            'api_name' => 'Blog API',
            'version' => '1.0.0',
            'environment' => app()->environment(),
            'timezone' => config('app.timezone'),
            'locale' => config('app.locale'),
            'available_modules' => [
                'quotes' => 'Module de gestion des citations',
                'posts' => 'Module de gestion des articles',
                'products' => 'Module de gestion des produits'
            ],
            'endpoints' => [
                'home' => [
                    'GET /' => 'Page d\'accueil avec aperçu',
                    'GET /stats' => 'Statistiques détaillées',
                    'GET /health' => 'État de santé du système',
                    'GET /info' => 'Informations sur l\'API'
                ]
            ],
            'documentation' => '/api/docs',
            'support' => 'support@blogapi.com'
        ];

        return response()->json($info);
    }

    // Méthodes privées pour simuler les données
    private function getSimulatedQuotes()
    {
        return [
            [
                'id' => 1,
                'quote' => 'La vie est ce qui vous arrive quand vous êtes occupé à faire d\'autres projets.',
                'author' => 'John Lennon',
                'category' => 'vie'
            ],
            [
                'id' => 2,
                'quote' => 'Le succès, c\'est tomber sept fois et se relever huit.',
                'author' => 'Proverbe japonais',
                'category' => 'motivation'
            ]
        ];
    }

    private function getRandomSimulatedQuote()
    {
        $quotes = $this->getSimulatedQuotes();
        return $quotes[array_rand($quotes)];
    }

    private function getSimulatedCategories()
    {
        return [
            ['id' => 1, 'name' => 'inspiration', 'type' => 'quotes', 'count' => 15],
            ['id' => 2, 'name' => 'motivation', 'type' => 'quotes', 'count' => 12],
            ['id' => 3, 'name' => 'technologie', 'type' => 'posts', 'count' => 8],
            ['id' => 4, 'name' => 'électronique', 'type' => 'products', 'count' => 25]
        ];
    }

    private function checkDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            return 'connected';
        } catch (\Exception $e) {
            return 'disconnected';
        }
    }

    // Méthodes pour obtenir les vrais comptes (en production avec les vraies tables)
    private function getQuoteCount()
    {
        try {
            return DB::table('quotes')->count();
        } catch (\Exception $e) {
            return rand(40, 60); // Valeur simulée si la table n'existe pas
        }
    }

    private function getQuoteCategoryCount()
    {
        try {
            return DB::table('categories')->where('type', 'quotes')->count();
        } catch (\Exception $e) {
            return rand(8, 12);
        }
    }

    private function getPostCount()
    {
        try {
            return DB::table('posts')->count();
        } catch (\Exception $e) {
            return rand(20, 30);
        }
    }

    private function getPublishedPostCount()
    {
        try {
            return DB::table('posts')->where('status', 'published')->count();
        } catch (\Exception $e) {
            return rand(15, 25);
        }
    }

    private function getProductCount()
    {
        try {
            return DB::table('products')->count();
        } catch (\Exception $e) {
            return rand(90, 110);
        }
    }
}
