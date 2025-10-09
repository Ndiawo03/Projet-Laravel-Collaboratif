<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'iPhone 15 Pro',
                'description' => 'Le dernier smartphone d\'Apple avec une caméra avancée',
                'price' => 1199.99,
                'discount_percentage' => 5.0,
                'rating' => 4.8,
                'stock' => 25,
                'brand' => 'Apple',
                'category' => 'smartphones',
                'thumbnail' => 'https://example.com/iphone15.jpg',
                'images' => ['https://example.com/iphone15-1.jpg', 'https://example.com/iphone15-2.jpg']
            ],
            [
                'title' => 'Samsung Galaxy S24',
                'description' => 'Smartphone Android haut de gamme avec écran AMOLED',
                'price' => 999.99,
                'discount_percentage' => 10.0,
                'rating' => 4.7,
                'stock' => 30,
                'brand' => 'Samsung',
                'category' => 'smartphones',
                'thumbnail' => 'https://example.com/galaxy-s24.jpg',
                'images' => ['https://example.com/galaxy-s24-1.jpg']
            ],
            [
                'title' => 'MacBook Pro M3',
                'description' => 'Ordinateur portable professionnel avec puce M3',
                'price' => 2499.99,
                'discount_percentage' => 0.0,
                'rating' => 4.9,
                'stock' => 15,
                'brand' => 'Apple',
                'category' => 'laptops',
                'thumbnail' => 'https://example.com/macbook-pro.jpg',
                'images' => ['https://example.com/macbook-pro-1.jpg', 'https://example.com/macbook-pro-2.jpg']
            ],
            [
                'title' => 'Dell XPS 13',
                'description' => 'Ultrabook Windows 11 avec écran InfinityEdge',
                'price' => 1299.99,
                'discount_percentage' => 15.0,
                'rating' => 4.6,
                'stock' => 20,
                'brand' => 'Dell',
                'category' => 'laptops',
                'thumbnail' => 'https://example.com/dell-xps13.jpg',
                'images' => ['https://example.com/dell-xps13-1.jpg']
            ],
            [
                'title' => 'Nike Air Max 270',
                'description' => 'Chaussures de sport confortables avec semelle Air Max',
                'price' => 149.99,
                'discount_percentage' => 20.0,
                'rating' => 4.5,
                'stock' => 50,
                'brand' => 'Nike',
                'category' => 'footwear',
                'thumbnail' => 'https://example.com/air-max-270.jpg',
                'images' => ['https://example.com/air-max-270-1.jpg']
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Ajout de 15 produits automatiquement avec factory
        \App\Models\Product::factory(15)->create();
    }
}
