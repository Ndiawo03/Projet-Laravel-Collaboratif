<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quoteCategories = [
            ['name' => 'inspiration', 'slug' => 'inspiration', 'type' => 'quotes'],
            ['name' => 'motivation', 'slug' => 'motivation', 'type' => 'quotes'],
            ['name' => 'amour', 'slug' => 'amour', 'type' => 'quotes'],
            ['name' => 'succès', 'slug' => 'succes', 'type' => 'quotes'],
            ['name' => 'bonheur', 'slug' => 'bonheur', 'type' => 'quotes'],
            ['name' => 'sagesse', 'slug' => 'sagesse', 'type' => 'quotes'],
            ['name' => 'philosophie', 'slug' => 'philosophie', 'type' => 'quotes'],
            ['name' => 'vie', 'slug' => 'vie', 'type' => 'quotes'],
            ['name' => 'amitié', 'slug' => 'amitie', 'type' => 'quotes'],
            ['name' => 'espoir', 'slug' => 'espoir', 'type' => 'quotes'],
        ];

        foreach ($quoteCategories as $category) {
            Category::create($category);
        }
    }
}
