# Module Citations - API Documentation

## Description
Module de gestion des citations pour l'API Blog. Ce module permet de créer, lire, mettre à jour et supprimer des citations ainsi que de gérer leurs catégories.

**Branche Git :** `citations`  
**Développeur responsable :** Ndiawo

## Structure du module

### Modèles
- `Quote` : Modèle principal pour les citations
- `Category` : Modèle pour les catégories (type 'quotes')

### Contrôleurs
- `QuoteController` : Gestion complète des citations (CRUD + fonctionnalités spéciales)

### Validations
- `StoreQuoteRequest` : Validation pour la création de citations
- `UpdateQuoteRequest` : Validation pour la mise à jour de citations

### Migrations
- `create_categories_table` : Table des catégories
- `create_quotes_table` : Table des citations

### Seeders & Factories
- `CategorySeeder` : Crée les catégories de citations
- `QuoteSeeder` : Crée 50 citations de test
- `QuoteFactory` : Factory pour générer des citations

## Endpoints API

### Base URL
```
http://127.0.0.1:8000/api
```

### 1. Lister toutes les citations
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

**Réponse :**
```json
{
    "data": [
        {
            "id": 1,
            "quote": "La vie est ce qui vous arrive...",
            "author": "John Lennon",
            "category": "inspiration",
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

### 2. Récupérer une citation aléatoire
```http
GET /quotes/random
```

**Réponse :**
```json
{
    "data": {
        "id": 15,
        "quote": "Le bonheur n'est pas quelque chose de tout fait...",
        "author": "Dalaï Lama",
        "category": "bonheur"
    }
}
```

### 3. Rechercher des citations
```http
GET /quotes/search?q={terme}
```

**Paramètres :**
- `q` : Terme de recherche (minimum 2 caractères)

**Exemple :**
```http
GET /quotes/search?q=succès
```

### 4. Récupérer une citation spécifique
```http
GET /quotes/{id}
```

### 5. Créer une nouvelle citation
```http
POST /quotes
Content-Type: application/json

{
    "quote": "Votre citation ici",
    "author": "Nom de l'auteur",
    "category": "inspiration"
}
```

**Validation :**
- `quote` : Obligatoire, 10-1000 caractères
- `author` : Obligatoire, max 255 caractères
- `category` : Optionnel, max 100 caractères

### 6. Mettre à jour une citation
```http
PUT /quotes/{id}
Content-Type: application/json

{
    "quote": "Citation mise à jour",
    "author": "Auteur mis à jour",
    "category": "nouvelle-categorie"
}
```

### 7. Supprimer une citation
```http
DELETE /quotes/{id}
```

### 8. Récupérer les catégories de citations
```http
GET /categories/quotes
```

**Réponse :**
```json
{
    "data": [
        {
            "id": 1,
            "name": "inspiration",
            "slug": "inspiration",
            "type": "quotes"
        }
    ]
}
```

## Catégories pré-configurées

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

## Tests

### Test automatisé
```bash
php test_citations.php
```

### Collection Postman
Importer le fichier : `Blog_API_Citations.postman_collection.json`

## Base de données

### Table `quotes`
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

### Table `categories`
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

## Installation et déploiement

1. Se placer sur la branche citations :
```bash
git checkout citations
```

2. Installer les dépendances :
```bash
composer install
```

3. Exécuter les migrations :
```bash
php artisan migrate
```

4. Peupler la base de données :
```bash
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=QuoteSeeder
```

5. Démarrer le serveur :
```bash
php artisan serve
```

## Intégration avec d'autres modules

Ce module est conçu pour être indépendant mais peut s'intégrer facilement avec :
- Module Articles (tags communs)
- Module Produits (catégories communes)
- Module Page d'accueil (agrégation de données)

## Sécurité

- Validation stricte des données d'entrée
- Protection contre l'injection SQL via Eloquent
- Gestion des erreurs avec des messages appropriés

## Performance

- Pagination automatique (10 éléments par défaut)
- Index sur les colonnes de recherche
- Cache possible pour les citations populaires (future amélioration)
