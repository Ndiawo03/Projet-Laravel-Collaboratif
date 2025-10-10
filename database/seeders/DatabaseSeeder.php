<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        //relier le seeder des produits
        $this->call(ProductSeeder::class);
        
        // User::factory(10)->create();

        \App\Models\User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );

        // Seed categories and quotes
        $this->call([
            CategorySeeder::class,
            QuoteSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
