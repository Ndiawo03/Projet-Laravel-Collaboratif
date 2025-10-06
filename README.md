# Projet Laravel API - Blog API

API REST collaborative développée avec Laravel 11 pour remplacer l'API DummyJSON dans un projet React existant.

## Vue d'ensemble du projet

Ce projet consiste à créer une API complète avec Laravel qui fournira les mêmes types de données que DummyJSON, permettant ainsi de connecter un frontend React existant à une API personnalisée.

## Équipe de développement

- **Thiané** - Responsable du module Produits
- **Ndiawo** - Responsable des modules Citations et Page d'accueil 
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
- **accueil** - Module page d'accueil et dashboard (Ndiawo)  
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

### Module Page d'accueil (Branche: accueil)  
**Statut : Terminé**
- Dashboard avec vue d'ensemble
- Statistiques générales de l'API
- Monitoring de l'état de santé du système
- Informations détaillées sur l'API
- Compatible avec tous les modules

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

Pour tester le module Accueil :
```bash
git checkout accueil
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
- [x] Module Page d'accueil (Ndiawo)  
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

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# Projet-Laravel-Collaboratif
>>>>>>> bbd3be680728a158ded0f4a79fe9fb096700ca70
