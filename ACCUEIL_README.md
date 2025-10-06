# Blog API - Module Page d'Accueil

Module de gestion de la page d'accueil et du dashboard pour l'API Blog Laravel.

## Serveur de développement

Le serveur est démarré sur : http://127.0.0.1:8000

## Vue d'ensemble

Ce module fournit les endpoints pour :
- Page d'accueil avec aperçu général
- Statistiques détaillées du dashboard
- État de santé du système
- Informations sur l'API

## Endpoints disponibles

### 🏠 Page d'accueil

#### GET `/api/`
Retourne un aperçu général de l'API avec des données simulées.

**Réponse :**
```json
{
    "message": "Bienvenue sur l'API Blog",
    "version": "1.0.0",
    "data": {
        "recent_quotes": [...],
        "random_quote": {...},
        "categories": [...],
        "stats": {
            "total_quotes": 50,
            "total_posts": 25,
            "total_products": 100,
            "total_categories": 15,
            "users_online": 12
        },
        "api_endpoints": {
            "quotes": "/api/quotes",
            "posts": "/api/posts", 
            "products": "/api/products"
        }
    }
}
```

### 📊 Statistiques

#### GET `/api/stats`
Retourne les statistiques détaillées de tous les modules.

**Réponse :**
```json
{
    "success": true,
    "data": {
        "quotes": {
            "total": 50,
            "categories": 10,
            "recent": 5,
            "popular_category": "inspiration"
        },
        "posts": {
            "total": 25,
            "published": 20,
            "drafts": 5,
            "recent": 3
        },
        "products": {
            "total": 100,
            "in_stock": 85,
            "categories": 10,
            "recent": 4
        },
        "general": {
            "users": 250,
            "visitors_today": 150,
            "api_calls_today": 2500,
            "uptime": "99.9%"
        }
    },
    "generated_at": "2025-10-06T16:30:00.000000Z"
}
```

### 🏥 État de santé

#### GET `/api/health`
Vérifie l'état de santé du système.

**Réponse :**
```json
{
    "status": "healthy",
    "database": "connected",
    "cache": "operational",
    "storage": "operational",
    "memory_usage": "45%",
    "disk_usage": "30%",
    "response_time": "120ms",
    "last_check": "2025-10-06T16:30:00.000000Z"
}
```

### ℹ️ Informations API

#### GET `/api/info`
Retourne les informations détaillées sur l'API.

**Réponse :**
```json
{
    "api_name": "Blog API",
    "version": "1.0.0",
    "environment": "local",
    "timezone": "UTC",
    "locale": "en",
    "available_modules": {
        "quotes": "Module de gestion des citations",
        "posts": "Module de gestion des articles",
        "products": "Module de gestion des produits"
    },
    "endpoints": {
        "home": {
            "GET /": "Page d'accueil avec aperçu",
            "GET /stats": "Statistiques détaillées",
            "GET /health": "État de santé du système",
            "GET /info": "Informations sur l'API"
        }
    },
    "documentation": "/api/docs",
    "support": "support@blogapi.com"
}
```

### 🏓 Test de connectivité

#### GET `/api/ping`
Test simple pour vérifier que l'API répond.

**Réponse :**
```json
{
    "message": "pong",
    "timestamp": "2025-10-06T16:30:00.000000Z",
    "module": "accueil"
}
```

## Tests avec Postman

### 1. Page d'accueil
```
GET http://127.0.0.1:8000/api/
```

### 2. Statistiques détaillées
```
GET http://127.0.0.1:8000/api/stats
```

### 3. État de santé
```
GET http://127.0.0.1:8000/api/health
```

### 4. Informations API
```
GET http://127.0.0.1:8000/api/info
```

### 5. Test de ping
```
GET http://127.0.0.1:8000/api/ping
```

## Fonctionnalités spéciales

### 🔄 Adaptabilité
Ce module peut fonctionner :
- **Avec les vraies données** : Quand les autres modules (citations, posts, produits) sont disponibles
- **Avec des données simulées** : Quand les modules ne sont pas encore développés/déployés

### 📈 Surveillance
- Surveillance de l'état de la base de données
- Métriques de performance (mémoire, disque)
- Compteurs d'utilisation (visiteurs, appels API)

### 🛠️ Administration
- Vue d'ensemble de tous les modules
- Statistiques centralisées
- État de santé du système

## Intégration avec les autres modules

Ce module est conçu pour s'intégrer automatiquement avec :
- **Module Citations** : Affiche les citations récentes et statistiques
- **Module Posts** : Affiche les articles récents et statistiques  
- **Module Products** : Affiche les produits récents et statistiques

Quand un module n'est pas disponible, des données simulées sont utilisées pour maintenir la fonctionnalité.

## Tests automatisés

Utilisez le script de test :
```bash
php test_accueil.php
```

## Structure des données

### Données simulées (mode standalone)
- Citations d'exemple avec auteurs célèbres
- Catégories pour tous les types de contenu
- Statistiques générées aléatoirement mais réalistes

### Données réelles (mode intégré)
- Requêtes directes aux tables de la base de données
- Statistiques calculées en temps réel
- Données agrégées de tous les modules

## Support et contact

- Documentation complète : Voir ce fichier
- Tests : `test_accueil.php`
- Support : Module développé pour le projet collaboratif Laravel
