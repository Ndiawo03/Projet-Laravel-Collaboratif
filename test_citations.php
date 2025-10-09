#!/usr/bin/env php
<?php

/**
 * Script de test pour le MODULE CITATIONS uniquement
 * Branche: citations
 */

$baseUrl = 'http://127.0.0.1:8000/api';

echo "=== TEST DU MODULE CITATIONS ===\n\n";

// Test 1: Liste des citations
echo "1. Test de la liste des citations...\n";
$response = file_get_contents($baseUrl . '/quotes');
if ($response) {
    $data = json_decode($response, true);
    if (isset($data['data'])) {
        echo "   ✓ Citations récupérées: " . count($data['data']) . "\n";
        echo "   ✓ Total: " . $data['total'] . "\n";
    }
} else {
    echo "   ✗ Erreur lors de la récupération des citations\n";
}
echo "\n";

// Test 2: Citation aléatoire
echo "2. Test citation aléatoire...\n";
$response = file_get_contents($baseUrl . '/quotes/random');
if ($response) {
    $data = json_decode($response, true);
    if (isset($data['data'])) {
        echo "   ✓ Citation: " . substr($data['data']['quote'], 0, 50) . "...\n";
        echo "   ✓ Auteur: " . $data['data']['author'] . "\n";
    }
} else {
    echo "   ✗ Erreur lors de la récupération de la citation aléatoire\n";
}
echo "\n";

// Test 3: Citation par ID
echo "3. Test citation spécifique (ID 1)...\n";
$response = file_get_contents($baseUrl . '/quotes/1');
if ($response) {
    $data = json_decode($response, true);
    if (isset($data['data'])) {
        echo "   ✓ Citation ID 1: " . substr($data['data']['quote'], 0, 50) . "...\n";
        echo "   ✓ Auteur: " . $data['data']['author'] . "\n";
    }
} else {
    echo "   ✗ Erreur lors de la récupération de la citation ID 1\n";
}
echo "\n";

// Test 4: Catégories
echo "4. Test des catégories de citations...\n";
$response = file_get_contents($baseUrl . '/categories/quotes');
if ($response) {
    $data = json_decode($response, true);
    if (isset($data['data'])) {
        echo "   ✓ Catégories trouvées: " . count($data['data']) . "\n";
        if (count($data['data']) > 0) {
            echo "   ✓ Première catégorie: " . $data['data'][0]['name'] . "\n";
        }
    }
} else {
    echo "   ✗ Erreur lors de la récupération des catégories\n";
}
echo "\n";

// Test 5: Filtrage par catégorie
echo "5. Test filtrage par catégorie (inspiration)...\n";
$response = file_get_contents($baseUrl . '/quotes?category=inspiration');
if ($response) {
    $data = json_decode($response, true);
    if (isset($data['data'])) {
        echo "   ✓ Citations filtrées: " . count($data['data']) . "\n";
    }
} else {
    echo "   ✗ Erreur lors du filtrage par catégorie\n";
}
echo "\n";

// Test 6: Recherche
echo "6. Test recherche (mot: 'succès')...\n";
$response = file_get_contents($baseUrl . '/quotes/search?q=succès');
if ($response) {
    $data = json_decode($response, true);
    if (isset($data['data'])) {
        echo "   ✓ Résultats de recherche: " . count($data['data']) . "\n";
    }
} else {
    echo "   ✗ Erreur lors de la recherche\n";
}
echo "\n";

echo "=== TESTS DU MODULE CITATIONS TERMINÉS ===\n";
echo "Pour tester les opérations CRUD (POST, PUT, DELETE), utilisez Postman\n";
echo "Collection Postman disponible: Blog_API_Citations.postman_collection.json\n";
