# Module Citations - API Laravel

API de gestion des citations développée avec Laravel 11. Ce module fait partie du projet Blog API collaboratif.

## Description

Module complet de gestion des citations permettant de créer, lire, mettre à jour et supprimer des citations ainsi que de gérer leurs catégories. Développé par Ndiawo dans le cadre du projet collaboratif Laravel.

## Fonctionnalités

### Gestion des citations
- Création de nouvelles citations
- Consultation de toutes les citations avec pagination
- Récupération d'une citation spécifique
- Mise à jour des citations existantes
- Suppression de citations
- Citation aléatoire optimisée

### Système de catégories
- 10 catégories pré-configurées
- Filtrage par catégorie
- Gestion des relations entre citations et catégories

### Recherche et filtrage
- Recherche textuelle dans les citations
- Filtrage par catégorie
- Pagination configurable

## Endpoints API

### URL de base
```
http://127.0.0.1:8000/api
```

### Citations

#### Lister toutes les citations
```http
GET /quotes
```
**Paramètres optionnels :**
- `category` : Filtrer par catégorie
- `per_page` : Nombre d'éléments par page (défaut: 10)
- `page` : Numéro de page

**Exemples :**
```http
GET /quotes
GET /quotes?category=inspiration
GET /quotes?per_page=20&page=2
```

#### Citation aléatoire
```http
GET /quotes/random
```

#### Rechercher des citations
```http
GET /quotes/search?q=terme
```

#### Citation spécifique
```http
GET /quotes/{id}
```

#### Créer une citation
```http
POST /quotes
Content-Type: application/json

{
    "quote": "Votre citation ici",
    "author": "Nom de l'auteur", 
    "category": "inspiration"
}
```

#### Modifier une citation
```http
PUT /quotes/{id}
Content-Type: application/json

{
    "quote": "Citation modifiée",
    "author": "Auteur modifié",
    "category": "nouvelle-categorie"
}
```

#### Supprimer une citation
```http
DELETE /quotes/{id}
```

### Catégories

#### Lister les catégories de citations
```http
GET /categories/quotes
```

## Validation des données

### Création/Modification de citations
- **quote** : Obligatoire, 10-1000 caractères
- **author** : Obligatoire, maximum 255 caractères  
- **category** : Optionnel, maximum 100 caractères

## Catégories disponibles

1. **inspiration** - Citations inspirantes
2. **motivation** - Citations motivantes  
3. **amour** - Citations sur l'amour
4. **succès** - Citations sur le succès
5. **bonheur** - Citations sur le bonheur
6. **sagesse** - Citations de sagesse
7. **philosophie** - Citations philosophiques
8. **vie** - Citations sur la vie
9. **amitié** - Citations sur l'amitié
10. **espoir** - Citations d'espoir

## Installation et démarrage

### Prérequis
- PHP 8.2+
- Composer
- Git

### Installation
```bash
# Cloner et se placer sur la bonne branche
git clone https://github.com/Ndiawo03/Projet-Laravel-Collaboratif.git
cd BlogAPI
git checkout citations

# Installer les dépendances
composer install

# Configuration
cp .env.example .env
php artisan key:generate

# Base de données
php artisan migrate
php artisan db:seed

# Démarrer le serveur
php artisan serve
```

### Tester l'API
```bash
# Script de test automatisé
php test_citations.php

# Ou utiliser la collection Postman
# Importer : Citations_Module.postman_collection.json
```

## Structure technique

### Modèles
- **Quote** : Modèle principal des citations avec factory
- **Category** : Modèle des catégories avec relations

### Contrôleurs
- **QuoteController** : Gestion complète des citations (API Resource Controller)

### Validation
- **StoreQuoteRequest** : Validation création de citations
- **UpdateQuoteRequest** : Validation modification de citations

### Migrations
- **create_categories_table** : Table des catégories universelles
- **create_quotes_table** : Table des citations

### Seeders
- **CategorySeeder** : Création des 10 catégories de citations
- **QuoteSeeder** : Création de 50 citations de test en français

## Base de données

### Table quotes
```sql
CREATE TABLE quotes (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    quote TEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    category VARCHAR(100) NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Table categories  
```sql
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    type ENUM('products', 'quotes', 'posts') NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

## Tests

### Test automatisé
Le script `test_citations.php` teste automatiquement tous les endpoints :
```bash
php test_citations.php
```

### Collection Postman
Collection complète disponible : `Citations_Module.postman_collection.json`

Variables d'environnement :
- `base_url` : `http://127.0.0.1:8000/api`

## Exemples de réponses

### Liste des citations
```json
{
    "data": [
        {
            "id": 1,
            "quote": "La vie est ce qui vous arrive quand vous êtes occupé à faire d'autres projets.",
            "author": "John Lennon",
            "category": "vie",
            "created_at": "2025-10-06T16:51:34.000000Z",
            "updated_at": "2025-10-06T16:51:34.000000Z"
        }
    ],
    "current_page": 1,
    "last_page": 5,
    "per_page": 10,
    "total": 50
}
```

### Citation aléatoire
```json
{
    "data": {
        "id": 15,
        "quote": "Le bonheur n'est pas quelque chose de tout fait. Il vient de vos propres actions.",
        "author": "Dalaï Lama",
        "category": "bonheur"
    }
}
```

## Sécurité et bonnes pratiques

- Validation stricte des données d'entrée
- Protection contre l'injection SQL via Eloquent ORM
- Gestion d'erreurs avec messages appropriés
- Respect des conventions REST
- Code documenté et structuré

## Performance

- Pagination automatique pour éviter la surcharge
- Index sur les colonnes de recherche
- Requêtes optimisées avec Eloquent
- Cache possible pour les citations populaires (amélioration future)

## Intégration

Ce module est conçu pour s'intégrer facilement avec :
- Module Articles (catégories communes)
- Frontend React (remplacement de DummyJSON)

## Développement

### Standards respectés
- Conventions de nommage Laravel
- Structure MVC respectée
- Validation via Form Requests
- Tests inclus

### Fichiers principaux
- `app/Http/Controllers/QuoteController.php`
- `app/Models/Quote.php` 
- `app/Models/Category.php`
- `app/Http/Requests/StoreQuoteRequest.php`
- `app/Http/Requests/UpdateQuoteRequest.php`
- `database/migrations/create_quotes_table.php`
- `database/seeders/QuoteSeeder.php`
- `database/factories/QuoteFactory.php`

## Auteur

**Ndiawo** - Développeur responsable du module Citations  
Projet réalisé dans le cadre du cours Laravel collaboratif

## Licence

Projet éducatif - Laravel API Blog

## First-time setup (pour les contributeurs)

Après un `git pull`, exécutez l'une des options suivantes pour initialiser l'application localement (Windows PowerShell) :

Option manuelle :

```powershell
composer install
if (-Not (Test-Path .env)) { Copy-Item .env.example .env }
php artisan key:generate
if (-Not (Test-Path database\database.sqlite)) { New-Item -ItemType File database\database.sqlite }
php artisan migrate --force --seed
php artisan route:clear
php artisan serve
```

Option automatique :

```powershell
composer run setup
```

Le script `composer run setup` exécute `scripts/dev-setup.ps1` (Windows) ou `scripts/dev-setup.sh` (POSIX) et s'occupe de copier `.env`, créer le fichier sqlite, générer la clé d'application et lancer les migrations + seeders.

Si `/api/posts` retourne un tableau vide, exécutez :

```powershell
php artisan db:seed --class=RealisticPostSeeder --force
```

