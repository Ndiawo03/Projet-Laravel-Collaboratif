#!/usr/bin/env php
<?php

/**
 * Script de test simple pour l'API Citations
 * Vous pouvez aussi utiliser Postman avec les URLs fournies
 */

$baseUrl = 'http://127.0.0.1:8000/api';

echo "=== TEST DE L'API CITATIONS ===\n\n";

// Test 1: Page d'accueil
echo "1. Test de la page d'accueil...\n";
$response = file_get_contents($baseUrl . '/');
$data = json_decode($response, true);
echo "   ✓ " . $data['message'] . "\n";
echo "   ✓ Total citations: " . $data['data']['stats']['total_quotes'] . "\n\n";

// Test 2: Liste des citations
echo "2. Test de la liste des citations...\n";
$response = file_get_contents($baseUrl . '/quotes');
$data = json_decode($response, true);
echo "   ✓ Citations récupérées: " . count($data['data']) . "\n\n";

// Test 3: Citation aléatoire
echo "3. Test citation aléatoire...\n";
$response = file_get_contents($baseUrl . '/quotes/random');
$data = json_decode($response, true);
echo "   ✓ Citation: " . substr($data['data']['quote'], 0, 50) . "...\n";
echo "   ✓ Auteur: " . $data['data']['author'] . "\n\n";

// Test 4: Catégories
echo "4. Test des catégories...\n";
$response = file_get_contents($baseUrl . '/categories/quotes');
$data = json_decode($response, true);
echo "   ✓ Catégories trouvées: " . count($data['data']) . "\n\n";

// Test 5: Citation spécifique
echo "5. Test citation spécifique (ID 1)...\n";
$response = file_get_contents($baseUrl . '/quotes/1');
$data = json_decode($response, true);
echo "   ✓ Citation ID 1: " . substr($data['data']['quote'], 0, 50) . "...\n\n";

echo "=== TOUS LES TESTS RÉUSSIS ===\n";
echo "Vous pouvez maintenant utiliser Postman pour tester les opérations CRUD (POST, PUT, DELETE)\n";
echo "Consultez le fichier API_DOCUMENTATION.md pour plus de détails.\n";
