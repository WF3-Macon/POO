<?php

require_once 'Repository/AvisRepository.php';

class Avis {

    public function insert(Entity\Avis $avis)
    {
        // Nettoie la chaîne de caractère
        // $avis = htmlspecialchars(strip_tags($avis->getContent()));

        // Insertion en BDD
        $avisRepository = new AvisRepository();
        return $avisRepository->add($avis);
    }

}