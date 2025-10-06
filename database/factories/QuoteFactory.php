<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'inspiration',
            'motivation',
            'amour',
            'succès',
            'bonheur',
            'sagesse',
            'philosophie',
            'vie',
            'amitié',
            'espoir'
        ];

        $quotes = [
            "La vie est ce qui vous arrive quand vous êtes occupé à faire d'autres projets.",
            "Le succès, c'est tomber sept fois et se relever huit.",
            "Il n'y a qu'une façon d'éviter la critique : ne rien faire, ne rien dire et n'être rien.",
            "Le bonheur n'est pas quelque chose de tout fait. Il vient de vos propres actions.",
            "La meilleure façon de prédire l'avenir, c'est de l'inventer.",
            "Vous ratez 100% des coups que vous ne tirez pas.",
            "La seule façon de faire du bon travail est d'aimer ce que vous faites.",
            "L'innovation distingue un leader d'un suiveur.",
            "Il vaut mieux être seul que mal accompagné.",
            "Ce qui ne nous tue pas nous rend plus fort."
        ];

        $authors = [
            "John Lennon",
            "Confucius",
            "Aristote",
            "Dalaï Lama",
            "Alan Kay",
            "Wayne Gretzky",
            "Steve Jobs",
            "Steve Jobs",
            "Proverbe français",
            "Friedrich Nietzsche"
        ];

        $randomIndex = array_rand($quotes);

        return [
            'quote' => $quotes[$randomIndex],
            'author' => $authors[$randomIndex],
            'category' => $this->faker->randomElement($categories),
        ];
    }
}
