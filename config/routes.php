<?php

require_once '../src/Controller/AvisController.php';

/**
 * Fichier de configuration des routes
 */
switch($uri) {
    // Accueil
    case '/':
        // Charge le controller et la méthode correspondant à la vue souhaitée
        $controller = new AvisController();
        $controller->insert();
        break;

    // Affiche tous les avis
    case '/liste':
        $controller = new AvisController();
        $controller->liste();
        break;

    // Supprimer un avis
    case '/delete/avis':
        $controller = new AvisController();
        $controller->delete();
        break;

    // Modifie un avis
    case '/edit/avis':
        $controller = new AvisController();
        $controller->edit();
        break;

    default:
        echo '<h1>Erreur 404</h1>';
}