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
            //genere des données fictives pour chaque champ
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'discount_percentage' => $this->faker->randomFloat(2, 0, 50),
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'stock' => $this->faker->numberBetween(0, 100),
            'brand' => $this->faker->company(),
            'category' => $this->faker->word(),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'products', true),
            'images' => [$this->faker->imageUrl(640, 480, 'products', true), $this->faker->imageUrl(640, 480, 'products', true)],
        ];
    }
}
