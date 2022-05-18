<?php

require_once __DIR__ .'../../Repository/AvisRepository.php';
require_once __DIR__ .'../../Entity/Avis.php';

class AvisController {

    /**
     * Formulaire permettant d'ajouter un avis
     * URL d'accès : http://avis.test
     */
    public function insert()
    {
        // Si le formulaire est envoyé, la superglobale $_POST est
        // remplie des données du formulaire
        if (!empty($_POST)) {

            // Envoyer les infos du formulaire à la classe Avis
            // Instancier l'entité Avis
            $entity = new Entity\Avis();
            $entity->setContent(htmlspecialchars(strip_tags($_POST['avis'])));

            // Insertion en BDD
            $avisRepository = new AvisRepository();
            $success = $avisRepository->add($entity);
        }

        // La vue correspondant à ce controller
        require_once __DIR__ .'../../../templates/index.php';
    }

    /**
     * Affiche tous les avis
     * URL d'accès : http://avis.test/liste
     */
    public function liste()
    {
        $avisRepository = new AvisRepository();
        $listAvis = $avisRepository->selectAll();
        
        require_once __DIR__ .'../../../templates/liste.php';
    }

    public function delete()
    {
        // var_dump($_GET['id']);

        // Appelle la méthode de suppression dans le repository en lui passant
        // l'ID de l'enregistrement à supprimer
        $avisRepository = new AvisRepository();
        $success = $avisRepository->remove($_GET['id']);

        // Redirige l'utilisateur vers la route "/liste"
        header('Location: /liste?delete='. $success);
    }

    /**
     * Permet d'éditer un avis
     */
    public function edit()
    {
        // var_dump($_GET['id']);
        $avisRepository = new AvisRepository();
        $avis = $avisRepository->selectOne($_GET['id']);

        // Si le formulaire est envoyé
        if (!empty($_POST)) {
            // Ecrase l'ancien contenu de l'objet "Avis" par celui du formulaire
            $avis->setContent(htmlspecialchars(strip_tags($_POST['avis'])));

            // Transmet cet objet à une méthode du repository pour mise à jour
            $success = $avisRepository->update($avis);

            // Redirige l'utilisateur vers la tableau
            header('Location: /liste?edit='. $success);
        }

        require_once __DIR__ .'../../../templates/edit.php';
    }
}
