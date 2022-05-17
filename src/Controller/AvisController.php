<?php

require_once __DIR__ .'../../Repository/AvisRepository.php';
require_once __DIR__ .'../../Entity/Avis.php';

class AvisController {

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

    public function contact()
    {
        require_once __DIR__ .'../../../templates/contact.php';
    }

}