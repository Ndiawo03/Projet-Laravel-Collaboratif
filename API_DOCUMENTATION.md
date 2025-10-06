# Blog API - Module Citations

API REST pour la gestion des citations développée avec Laravel 11.

## Serveur de développement

Le serveur est démarré sur : http://127.0.0.1:8000

## Endpoints disponibles

### Page d'accueil / Dashboard

#### GET `/api/`
Retourne un aperçu de l'API avec des statistiques et des citations récentes.

**Réponse :**
```json
{
    "message": "Bienvenue sur l'API Blog",
    "data": {
        "recent_quotes": [...],
        "random_quote": {...},
        "quote_categories": [...],
        "stats": {
            "total_quotes": 50,
            "total_categories": 10
        }
    }
}
```

#### GET `/api/stats`
Retourne les statistiques détaillées.

### Citations

#### GET `/api/quotes`
Récupère toutes les citations avec pagination.

**Paramètres optionnels :**
- `category` : Filtrer par catégorie
- `per_page` : Nombre d'éléments par page (défaut: 10)

**Exemple :**
- `GET /api/quotes`
- `GET /api/quotes?category=inspiration`
- `GET /api/quotes?per_page=20`

#### GET `/api/quotes/random`
Récupère une citation aléatoire.

#### GET `/api/quotes/{id}`
Récupère une citation spécifique par son ID.

#### POST `/api/quotes`
Crée une nouvelle citation.

**Corps de la requête :**
```json
{
    "quote": "La citation ici...",
    "author": "Nom de l'auteur",
    "category": "inspiration"
}
```

#### PUT `/api/quotes/{id}`
Met à jour une citation existante.

**Corps de la requête :**
```json
{
    "quote": "Citation mise à jour...",
    "author": "Auteur mis à jour",
    "category": "nouvelle-categorie"
}
```

#### DELETE `/api/quotes/{id}`
Supprime une citation.

### Catégories

#### GET `/api/categories/quotes`
Récupère toutes les catégories de citations.

## Tests avec Postman

### 1. Tester la page d'accueil
```
GET http://127.0.0.1:8000/api/
```

### 2. Récupérer toutes les citations
```
GET http://127.0.0.1:8000/api/quotes
```

### 3. Récupérer une citation aléatoire
```
GET http://127.0.0.1:8000/api/quotes/random
```

### 4. Filtrer les citations par catégorie
```
GET http://127.0.0.1:8000/api/quotes?category=inspiration
```

### 5. Créer une nouvelle citation
```
POST http://127.0.0.1:8000/api/quotes
Content-Type: application/json

{
    "quote": "Le succès n'est pas final, l'échec n'est pas fatal : c'est le courage de continuer qui compte.",
    "author": "Winston Churchill",
    "category": "motivation"
}
```

### 6. Récupérer une citation spécifique
```
GET http://127.0.0.1:8000/api/quotes/1
```

### 7. Mettre à jour une citation
```
PUT http://127.0.0.1:8000/api/quotes/1
Content-Type: application/json

{
    "quote": "Citation mise à jour",
    "author": "Auteur mis à jour"
}
```

### 8. Supprimer une citation
```
DELETE http://127.0.0.1:8000/api/quotes/1
```

### 9. Récupérer les catégories
```
GET http://127.0.0.1:8000/api/categories/quotes
```

## Validation

L'API valide automatiquement les données :

- **quote** : Obligatoire, chaîne de 10-1000 caractères
- **author** : Obligatoire, chaîne de maximum 255 caractères  
- **category** : Optionnel, chaîne de maximum 100 caractères

## Catégories disponibles

Les catégories suivantes sont pré-créées :
- inspiration
- motivation
- amour
- succès
- bonheur
- sagesse
- philosophie
- vie
- amitié
- espoir

## Structure de la base de données

### Table `categories`
- id (bigint, primary key)
- name (string)
- slug (string, unique)
- type (enum: 'products', 'quotes', 'posts')
- created_at (timestamp)
- updated_at (timestamp)

### Table `quotes`
- id (bigint, primary key)
- quote (text)
- author (string)
- category (string, nullable)
- created_at (timestamp)
- updated_at (timestamp)
