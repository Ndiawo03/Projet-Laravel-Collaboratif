<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10, 2000),
            'discount_percentage' => $this->faker->numberBetween(5, 30),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'stock' => $this->faker->numberBetween(0, 100),
            'brand' => $this->faker->company(),
            'category' => $this->faker->word(),
            'thumbnail' => $this->faker->imageUrl(400, 400, 'product'),
            'images' => json_encode([
                $this->faker->imageUrl(400, 400, 'product'),
                $this->faker->imageUrl(400, 400, 'product'),
                $this->faker->imageUrl(400, 400, 'product')
            ]),
        ];
    }
}
