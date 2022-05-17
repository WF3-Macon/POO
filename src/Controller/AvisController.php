<?php

require_once 'Repository/AvisRepository.php';

class AvisController {

    public function insert(Entity\Avis $avis)
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
            return $avisRepository->add($avis);
        }

        // La vue correspondant à ce controller
        require_once '../../templates/index.php';
    }

}