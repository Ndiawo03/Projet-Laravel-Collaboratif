<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $titles = [
            'Introduction à Laravel : Le framework PHP moderne',
            'Comment créer une API REST avec Laravel',
            'Les meilleures pratiques de développement PHP',
            'Guide complet des migrations Laravel',
            'Sécuriser votre application web avec Laravel',
            'Optimisation des performances dans Laravel',
            'Tests unitaires avec PHPUnit et Laravel',
            'Déploiement d\'une application Laravel en production',
            'Architecture MVC expliquée simplement',
            'Gestion des bases de données avec Eloquent ORM',
            'Authentification et autorisation dans Laravel',
            'Création d\'un blog avec Laravel et Vue.js',
            'Les nouveautés de PHP 8.3',
            'Docker pour les développeurs Laravel',
            'API GraphQL vs REST : comparaison et choix',
            'Microservices avec Laravel et Docker',
            'Cache et optimisation des requêtes',
            'Intégration continue avec GitHub Actions',
            'Design patterns essentiels en PHP',
            'Développement mobile avec Laravel API'
        ];

        $contentTemplates = [
            "Dans cet article, nous allons explorer les concepts fondamentaux du développement web moderne. La technologie évolue rapidement et il est essentiel de rester à jour avec les dernières tendances.\n\nLes frameworks modernes offrent de nombreux avantages en termes de productivité et de maintenabilité. Ils permettent aux développeurs de se concentrer sur la logique métier plutôt que sur les détails techniques.\n\nNous verrons également comment implémenter ces concepts dans des projets réels et quelles sont les meilleures pratiques à adopter.\n\nEnfin, nous aborderons les aspects liés à la performance et à la sécurité, qui sont cruciaux dans le développement d'applications web professionnelles.",
            
            "Le développement d'applications web nécessite une approche méthodique et structurée. Dans ce guide, nous allons découvrir les étapes essentielles pour créer des applications robustes et scalables.\n\nLa première étape consiste à bien comprendre les besoins du projet et à définir une architecture appropriée. Une bonne architecture facilite la maintenance et l'évolution de l'application.\n\nNous examinerons ensuite les outils et technologies disponibles, en mettant l'accent sur leur facilité d'utilisation et leur efficacité.\n\nPour conclure, nous présenterons des exemples concrets d'implémentation et des conseils pour éviter les erreurs courantes.",
            
            "La programmation orientée objet est un paradigme fondamental dans le développement moderne. Elle permet de créer du code réutilisable, maintenable et facile à comprendre.\n\nLes principes SOLID constituent la base d'une bonne conception orientée objet. Ils aident à créer des applications flexibles et extensibles.\n\nNous verrons comment appliquer ces principes dans des situations réelles et quels sont les bénéfices à long terme.\n\nL'utilisation de patterns de conception appropriés peut également améliorer significativement la qualité du code et faciliter sa compréhension par l'équipe.",
            
            "Les bases de données relationnelles jouent un rôle central dans la plupart des applications web. Une bonne compréhension de leur fonctionnement est essentielle pour développer des applications performantes.\n\nL'optimisation des requêtes est un aspect crucial qui peut considérablement améliorer les performances de votre application. Nous explorerons diverses techniques d'optimisation.\n\nLa modélisation des données doit être réfléchie dès le début du projet. Une bonne structure de base de données facilite les développements futurs.\n\nNous aborderons également les questions de sécurité et de sauvegarde, qui sont vitales pour la protection des données utilisateur."
        ];

        $tags = ['laravel', 'php', 'api', 'tutorial', 'développement', 'web', 'backend', 'frontend', 'database', 'sécurité', 'performance', 'framework'];

        return [
            'title' => $this->faker->randomElement($titles),
            'body' => $this->faker->randomElement($contentTemplates),
            'user_id' => User::factory(),
            'tags' => $this->faker->randomElements($tags, $this->faker->numberBetween(1,4)),
            'views' => $this->faker->numberBetween(10,2500),
        ];
    }
}