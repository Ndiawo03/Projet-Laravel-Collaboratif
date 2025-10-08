<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
# Projet-Laravel-Collaboratif

API REST Laravel pour un blog collaboratif — module Articles (Alpha)

Ce dépôt contient l'API Laravel qui sert les données pour le module "Articles" (posts). Elle est pensée pour remplacer une API distante (DummyJSON) et être consommée ensuite par un frontend React. Pour l'instant on teste avec Postman.

Contenu principal
- routes/api.php : endpoints API (posts, etc.)
- app/Models/Post.php : modèle Post
- app/Http/Controllers/PostController.php : contrôleur RESTful pour posts
- database/migrations : migrations (table posts incluse)
- database/factories, database/seeders : factories & seeders
- postman/ : collection et environnement pour tests Postman

Prérequis
- PHP 8.x (ou version compatible avec la version Laravel du projet)
- Composer
- Une base de données (MySQL, SQLite, etc.) configurée dans `.env`

Installation rapide
1. Installer les dépendances PHP :

```powershell
cd 'C:\Users\HP\Desktop\blog\Projet-Laravel-Collaboratif'
composer install
```

2. Copier le fichier d'environnement et configurer la BD :

```powershell
copy .env.example .env
# Édite .env : DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD
```

3. Générer la clé d'application et exécuter les migrations :

```powershell
php artisan key:generate
php artisan migrate
```

4. (Optionnel) Seed d'exemples :

```powershell
php artisan db:seed --class=PostSeeder
```

Lancer le serveur de développement

```powershell
php artisan serve --port=8000
```

API - Endpoints (module Articles)
Les routes sont définies dans `routes/api.php`. Préfixe appliqué : `/api`.

- GET /api/posts — liste paginée des articles (supporte q, tag, author, per_page)
- GET /api/posts/{id} — récupérer un article
- POST /api/posts — créer un article
- PUT /api/posts/{id} — mettre à jour un article
- DELETE /api/posts/{id} — supprimer un article
- GET /api/posts/search?q=... — recherche textuelle
- GET /api/posts/stats — statistiques (total, vues, top posts)

Tests Postman (fourni)
- Le dossier `postman/` contient :
	- `Blog-Articles-API.postman_collection.json` (collection)
	- `Blog-Local.postman_environment.json` (baseUrl = http://127.0.0.1:8000)

Importer les deux fichiers dans Postman, sélectionner l'environnement "Blog Local" puis exécuter la collection (Runner). La collection : crée un post, le récupère, le met à jour, recherche, récupère les stats, puis le supprime.

Dépannage rapide
- Si 404 sur `/api/...` :
	- Assure-toi qu'un seul serveur PHP est en écoute sur le port (pas de conflit avec d'autres projets).
	- Exécute : `php artisan route:clear && php artisan route:list --path=api` pour vérifier que les routes sont enregistrées.
- Si erreurs lors du seeding : vérifie `storage/logs/laravel.log` — un cas fréquent est l'absence du trait `HasFactory` sur `App\Models\Post` si on appelle `Post::factory()`.

Bonnes pratiques & suite possible
- Ajouter l'authentification (Sanctum) pour protéger les endpoints de création/modification.
- Ajouter des tests Feature PHPUnit pour couvrir les endpoints (index, store, show, update, delete).
- Intégrer l'upload d'images pour les articles si nécessaire.

Contributeurs
- Thiané (Produits)
- Ndiawo (Citations)
- Alpha (Articles)

Besoin d'aide ? Dis-moi si tu veux que je :
- génère les Request classes (StorePostRequest / UpdatePostRequest) si manquantes,
- ajoute les tests PHPUnit pour le module articles,
- supprime la route de debug `api/ping` que j'avais temporairement ajoutée.
