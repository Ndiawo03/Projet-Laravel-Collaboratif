#!/usr/bin/env php
<?php

/**
 * Script de test pour le Module Page d'Accueil
 * Tests des endpoints du dashboard et de la page d'accueil
 */

$baseUrl = 'http://127.0.0.1:8000/api';

echo "=== TEST DU MODULE PAGE D'ACCUEIL ===\n\n";

// Test 1: Page d'accueil principale
echo "1. Test de la page d'accueil principale...\n";
try {
    $response = file_get_contents($baseUrl . '/');
    $data = json_decode($response, true);
    echo "   ✓ " . $data['message'] . "\n";
    echo "   ✓ Version API: " . $data['version'] . "\n";
    echo "   ✓ Citations récentes: " . count($data['data']['recent_quotes']) . "\n";
    echo "   ✓ Total quotes (stats): " . $data['data']['stats']['total_quotes'] . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur: " . $e->getMessage() . "\n\n";
}

// Test 2: Statistiques détaillées
echo "2. Test des statistiques détaillées...\n";
try {
    $response = file_get_contents($baseUrl . '/stats');
    $data = json_decode($response, true);
    echo "   ✓ Citations totales: " . $data['data']['quotes']['total'] . "\n";
    echo "   ✓ Posts totaux: " . $data['data']['posts']['total'] . "\n";
    echo "   ✓ Produits totaux: " . $data['data']['products']['total'] . "\n";
    echo "   ✓ Utilisateurs: " . $data['data']['general']['users'] . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur: " . $e->getMessage() . "\n\n";
}

// Test 3: État de santé du système
echo "3. Test de l'état de santé...\n";
try {
    $response = file_get_contents($baseUrl . '/health');
    $data = json_decode($response, true);
    echo "   ✓ Statut: " . $data['status'] . "\n";
    echo "   ✓ Base de données: " . $data['database'] . "\n";
    echo "   ✓ Utilisation mémoire: " . $data['memory_usage'] . "\n";
    echo "   ✓ Temps de réponse: " . $data['response_time'] . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur: " . $e->getMessage() . "\n\n";
}

// Test 4: Informations sur l'API
echo "4. Test des informations API...\n";
try {
    $response = file_get_contents($baseUrl . '/info');
    $data = json_decode($response, true);
    echo "   ✓ Nom API: " . $data['api_name'] . "\n";
    echo "   ✓ Version: " . $data['version'] . "\n";
    echo "   ✓ Environnement: " . $data['environment'] . "\n";
    echo "   ✓ Modules disponibles: " . count($data['available_modules']) . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur: " . $e->getMessage() . "\n\n";
}

// Test 5: Test de ping
echo "5. Test de ping...\n";
try {
    $response = file_get_contents($baseUrl . '/ping');
    $data = json_decode($response, true);
    echo "   ✓ Réponse: " . $data['message'] . "\n";
    echo "   ✓ Module: " . $data['module'] . "\n";
    echo "   ✓ Timestamp: " . $data['timestamp'] . "\n\n";
} catch (Exception $e) {
    echo "   ✗ Erreur: " . $e->getMessage() . "\n\n";
}

echo "=== TESTS DU MODULE ACCUEIL TERMINÉS ===\n";
echo "Le module Page d'Accueil est prêt à être testé avec Postman.\n";
echo "Consultez ACCUEIL_README.md pour plus de détails.\n";
