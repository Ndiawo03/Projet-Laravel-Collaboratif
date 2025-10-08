<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource for homepage
     */
    public function index()
    {
        // Get recent quotes
        $recentQuotes = Quote::latest()->limit(5)->get();
        
        // Get a random quote
        $randomQuote = Quote::inRandomOrder()->first();
        
        // Get quote categories
        $quoteCategories = Category::where('type', 'quotes')->get();
        
        // Get stats
        $stats = [
            'total_quotes' => Quote::count(),
            'total_categories' => Category::where('type', 'quotes')->count(),
        ];

        return response()->json([
            'message' => 'Bienvenue sur l\'API Blog',
            'data' => [
                'recent_quotes' => $recentQuotes,
                'random_quote' => $randomQuote,
                'quote_categories' => $quoteCategories,
                'stats' => $stats,
            ]
        ]);
    }

    /**
     * Get dashboard statistics
     */
    public function stats()
    {
        $stats = [
            'quotes' => [
                'total' => Quote::count(),
                'categories' => Category::where('type', 'quotes')->count(),
                'recent' => Quote::whereDate('created_at', today())->count(),
            ]
        ];

        return response()->json([
            'data' => $stats
        ]);
    }
}
