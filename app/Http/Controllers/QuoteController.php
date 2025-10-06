<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Category;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Quote::query();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Apply pagination
        $perPage = $request->get('per_page', 10);
        $quotes = $query->paginate($perPage);

        return response()->json($quotes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuoteRequest $request)
    {
        $quote = Quote::create($request->validated());
        
        return response()->json([
            'message' => 'Citation créée avec succès',
            'data' => $quote
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quote::findOrFail($id);
        
        return response()->json([
            'data' => $quote
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, string $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($request->validated());
        
        return response()->json([
            'message' => 'Citation mise à jour avec succès',
            'data' => $quote
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();
        
        return response()->json([
            'message' => 'Citation supprimée avec succès'
        ]);
    }

    /**
     * Get a random quote
     */
    public function random()
    {
        $quote = Quote::inRandomOrder()->first();
        
        if (!$quote) {
            return response()->json([
                'message' => 'Aucune citation trouvée'
            ], 404);
        }
        
        return response()->json([
            'data' => $quote
        ]);
    }

    /**
     * Get quote categories
     */
    public function categories()
    {
        $categories = Category::where('type', 'quotes')->get();
        
        return response()->json([
            'data' => $categories
        ]);
    }
}
