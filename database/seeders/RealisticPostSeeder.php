<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class RealisticPostSeeder extends Seeder
{
    public function run(): void
    {
        // remove existing posts to have a clean dataset
        Post::truncate();

        $author = User::first() ?? User::factory()->create(['name' => 'Claire Dupont']);

        $posts = [
            [
                'title' => 'Comment bien démarrer avec Laravel 10',
                'body' => "Laravel 10 simplifie la création d'API grâce à ses outils intégrés. Dans cet article, nous expliquons comment configurer une application, gérer les migrations et structurer vos contrôleurs pour une API propre et maintenable.",
                'tags' => ['laravel','php','api'],
                'views' => 124,
            ],
            [
                'title' => 'Introduction aux tests fonctionnels en PHP',
                'body' => "Les tests fonctionnels garantissent que les endpoints de votre API répondent correctement. Nous couvrons PHPUnit, les tests de requêtes HTTP et des bonnes pratiques pour écrire des tests fiables.",
                'tags' => ['php','testing'],
                'views' => 98,
            ],
            [
                'title' => 'Meilleures pratiques pour sécuriser une API REST',
                'body' => "Sécuriser une API commence par l'authentification, la validation des entrées et le contrôle d'accès. Nous présentons OAuth, tokens personnels et astuces pour éviter les injections.",
                'tags' => ['security','api'],
                'views' => 210,
            ],
            [
                'title' => 'Optimiser les requêtes Eloquent',
                'body' => "Eloquent est puissant mais peut générer des requêtes coûteuses. Découvrez comment utiliser eager loading, indexes et pagination pour améliorer les performances.",
                'tags' => ['laravel','eloquent','performance'],
                'views' => 76,
            ],
            [
                'title' => 'Déploiement continu avec GitHub Actions',
                'body' => "Automatisez vos tests et déploiements avec les workflows GitHub Actions. Exemple: pipeline pour exécuter les tests, build assets et déployer vers un serveur cible.",
                'tags' => ['devops','ci'],
                'views' => 43,
            ],
            [
                'title' => 'Création d’un système de notifications en temps réel',
                'body' => "Nous explorons l'utilisation de websockets et de services tels que Pusher ou Socket.IO pour envoyer des notifications en temps réel aux utilisateurs.",
                'tags' => ['realtime','notifications'],
                'views' => 67,
            ],
            [
                'title' => 'Rédiger une documentation API efficace',
                'body' => "Une bonne documentation facilite l'adoption. Incluez des exemples d'appels, des schémas de données et un guide d'authentification clair.",
                'tags' => ['docs','api'],
                'views' => 12,
            ],
            [
                'title' => 'Travailler avec les fichiers et le stockage sous Laravel',
                'body' => "Laravel Filesystem abstrait le stockage local et cloud. Apprenez à stocker les uploads, gérer les permissions et générer des URLs signées.",
                'tags' => ['laravel','files'],
                'views' => 55,
            ],
            [
                'title' => 'Utiliser Faker pour des données réalistes en français',
                'body' => "Faker permet de générer du contenu réaliste pour le développement. Configurez la locale en fr_FR pour obtenir des noms et adresses en français.",
                'tags' => ['testing','faker'],
                'views' => 9,
            ],
            [
                'title' => 'Guide rapide : pagination et filtres',
                'body' => "Apprenez à paginer vos résultats et à implémenter des filtres simples sur les endpoints pour améliorer l'expérience utilisateur.",
                'tags' => ['api','pagination'],
                'views' => 31,
            ],
            [
                'title' => 'Conseils pour structurer un projet Laravel',
                'body' => "Structurez vos services, repositories et jobs pour garder un code lisible. Nous proposons une arborescence et des conventions sont utiles pour les équipes.",
                'tags' => ['architecture'],
                'views' => 5,
            ],
            [
                'title' => 'Améliorer l’accessibilité d’une API publique',
                'body' => "Documentez les erreurs, fournissez des exemples et utilisez des codes HTTP appropriés pour que les clients consomment votre API sans surprises.",
                'tags' => ['api','best-practices'],
                'views' => 7,
            ],
        ];

        foreach ($posts as $p) {
            Post::create([
                'title' => $p['title'],
                'body' => $p['body'],
                'user_id' => $author->id,
                'tags' => $p['tags'],
                'views' => $p['views'],
            ]);
        }
    }
}
