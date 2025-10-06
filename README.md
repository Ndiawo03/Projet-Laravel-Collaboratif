# Projet Laravel API - Blog API

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