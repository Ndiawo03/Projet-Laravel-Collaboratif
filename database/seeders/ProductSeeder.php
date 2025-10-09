<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'title' => 'iPhone 13 Pro',
                'description' => 'Le dernier iPhone avec une puissante puce A15 Bionic.',
                'price' => 1200.00,
                'discount_percentage' => 10.00,
                'rating' => 4.8,
                'stock' => 50,
                'brand' => 'Apple',
                'category' => 'smartphones',
                'thumbnail' => 'https://dummyjson.com/image/i/products/1/thumbnail.jpg',
                'images' => json_encode([
                    'https://dummyjson.com/image/i/products/1/1.jpg',
                    'https://dummyjson.com/image/i/products/1/2.jpg',
                    'https://dummyjson.com/image/i/products/1/3.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Samsung Galaxy S22',
                'description' => 'Un smartphone haut de gamme avec un superbe écran AMOLED.',
                'price' => 999.99,
                'discount_percentage' => 5.00,
                'rating' => 4.6,
                'stock' => 80,
                'brand' => 'Samsung',
                'category' => 'smartphones',
                'thumbnail' => 'https://dummyjson.com/image/i/products/2/thumbnail.jpg',
                'images' => json_encode([
                    'https://dummyjson.com/image/i/products/2/1.jpg',
                    'https://dummyjson.com/image/i/products/2/2.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'MacBook Air M2',
                'description' => 'Un ordinateur portable léger et puissant.',
                'price' => 1499.00,
                'discount_percentage' => 15.00,
                'rating' => 4.9,
                'stock' => 30,
                'brand' => 'Apple',
                'category' => 'laptops',
                'thumbnail' => 'https://dummyjson.com/image/i/products/3/thumbnail.jpg',
                'images' => json_encode([
                    'https://dummyjson.com/image/i/products/3/1.jpg',
                    'https://dummyjson.com/image/i/products/3/2.jpg'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        //ajout de 15 produits automatiquement avec factory
        \App\Models\Product::factory(15)->create();
        
    }
}
