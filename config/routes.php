<?php

require_once '../src/Controller/AvisController.php';

/**
 * Fichier de configuration des routes
 */
switch($uri) {
    // Accueil
    case '/':
        $controller = new AvisController();

        // Charge la méthode correspondant à la vue souhaitée
        $controller->insert();
        break;

    case '/contact':
        $controller = new AvisController();
        $controller->contact();
        break;

    default:
        echo '<h1>Erreur 404</h1>';
}