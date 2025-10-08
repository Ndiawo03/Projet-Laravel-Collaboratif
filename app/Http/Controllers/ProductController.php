<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Liste tous les produits
    public function index()
    {
        return response()->json(Product::all());
    }

    // Crée un produit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    // Affiche un produit spécifique
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Met à jour un produit
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    // Supprime un produit
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Produit supprimé']);
    }

    // Recherche de produit par mot-clé
    public function search($keyword)
    {
        $results = Product::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->get();

        return response()->json($results);
    }
}
