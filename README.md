# Projet Laravel API - Blog API

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
API REST collaborative développée avec Laravel 11 pour remplacer l'API DummyJSON dans un projet React existant.

## Vue d'ensemble du projet

Ce projet consiste à créer une API complète avec Laravel qui fournira les mêmes types de données que DummyJSON, permettant ainsi de connecter un frontend React existant à une API personnalisée.

## Équipe de développement

- **Thiané** - Responsable du module Produits
- **Ndiawo** - Responsable du module Citations
- **Alpha** - Responsable du module Articles

## Objectifs pédagogiques

- Maîtriser les concepts fondamentaux de Laravel
- Développer une API RESTful complète et professionnelle
- Apprendre la gestion de base de données avec Eloquent ORM
- Comprendre l'architecture full-stack moderne
- Pratiquer le développement collaboratif avec Git

## Architecture du projet

### Approche modulaire par branches

Le projet utilise une approche de développement par branches où chaque module est développé indépendamment :

- **main** - Configuration de base et documentation générale
- **citations** - Module de gestion des citations (Ndiawo)
- **produits** - Module de gestion des produits (Thiané)
- **articles** - Module de gestion des articles (Alpha)

### Technologies utilisées

- **Backend** : Laravel 11
- **Base de données** : SQLite (développement) / MySQL (production)
- **ORM** : Eloquent
- **Validation** : Form Requests Laravel
- **Tests** : Scripts PHP personnalisés + Postman
- **Documentation** : Markdown + Collections Postman

## Modules développés

### Module Citations (Branche: citations)
**Statut : Terminé**
- Gestion complète des citations (CRUD)
- Système de catégories
- Fonctionnalité de citation aléatoire
- Recherche et filtrage
- 50 citations de test en français

### Module Produits (Branche: produits)
**Statut : À développer par Thiané**
- Gestion des produits avec pricing
- Système de catégories produits
- Upload et gestion d'images
- Filtrage et recherche avancée
- Gestion des stocks et promotions

### Module Articles (Branche: articles)
**Statut : À développer par Alpha**
- Gestion des articles de blog
- Système d'auteurs
- Tags et catégories d'articles
- Statistiques de lecture
- Gestion des brouillons et publications

## Installation et configuration

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- Git

### Installation
```bash
# Cloner le repository
git clone https://github.com/Ndiawo03/Projet-Laravel-Collaboratif.git
cd BlogAPI

# Installer les dépendances
composer install
npm install

# Configuration de l'environnement
cp .env.example .env
php artisan key:generate

# Base de données
php artisan migrate
php artisan db:seed

# Démarrer le serveur
php artisan serve
```

## Utilisation des branches

### Tester un module spécifique

Pour tester le module Citations :
```bash
git checkout citations
php artisan migrate:fresh --seed
php artisan serve
```

### Développer un nouveau module

1. Créer une nouvelle branche depuis main
2. Développer le module avec ses migrations, modèles, contrôleurs
3. Créer les tests et la documentation
4. Merger vers main une fois terminé

## Structure de la base de données

### Tables communes à tous les modules

```sql
-- Catégories universelles
CREATE TABLE categories (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    slug VARCHAR(255) UNIQUE,
    type ENUM('products', 'quotes', 'posts'),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- Utilisateurs (gestion future)
CREATE TABLE users (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

## Configuration CORS

L'API est configurée pour accepter les requêtes cross-origin depuis :
- `http://localhost:3000` (React development)
- `http://127.0.0.1:3000`
- Configurable via variables d'environnement

## Tests et qualité

### Tests automatisés
Chaque module inclut des scripts de test automatisés :
- Tests d'endpoints
- Validation des données
- Vérification des réponses JSON

### Collections Postman
Collections complètes pour chaque module permettant de tester tous les endpoints rapidement.

### Standards de code
- Respect des conventions Laravel
- Documentation des méthodes
- Validation stricte des données
- Gestion d'erreurs cohérente

## Déploiement

### Environnement de développement
Le serveur de développement Laravel (`php artisan serve`) est utilisé pour les tests locaux.

### Production (future)
- Configuration pour déploiement sur serveurs web
- Optimisations de performance
- Gestion des logs et monitoring

## Documentation

Chaque module possède sa propre documentation détaillée accessible dans sa branche respective :
- README.md spécifique au module
- Collections Postman
- Scripts de test

## Roadmap

### Phase 1 - Développement des modules (En cours)
- [x] Module Citations (Ndiawo)
- [ ] Module Produits (Thiané)
- [ ] Module Articles (Alpha)

### Phase 2 - Intégration
- [ ] Fusion de tous les modules sur main
- [ ] Tests d'intégration
- [ ] Documentation globale

### Phase 3 - Connexion frontend
- [ ] Remplacement de DummyJSON par l'API Laravel
- [ ] Tests frontend/backend
- [ ] Optimisations performance

## Support et contribution

### Issues et bugs
Utiliser le système d'Issues GitHub pour reporter les problèmes ou demander de l'aide.

### Standards de contribution
1. Travailler sur une branche dédiée
2. Respecter les conventions de nommage
3. Inclure des tests
4. Documenter les changements
5. Créer une Pull Request pour review

## Licence

Projet éducatif dans le cadre d'un cours Laravel.

---

**Note importante** : Ce projet suit une approche de développement collaboratif par branches. Chaque développeur travaille sur son module de manière indépendante avant l'intégration finale, permettant un apprentissage optimal des concepts Laravel et des bonnes pratiques de développement en équipe.
