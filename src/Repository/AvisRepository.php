<?php

require_once 'Db.php';
require_once __DIR__ .'../../Entity/Avis.php';

/**
 * Gère le CRUD sur la table "avis"
 */
class AvisRepository extends Db {

    /**
     * Insertion dans la table SQL "avis"
     */
    public function add(Entity\Avis $avis)
    {
        $query = $this->getDb()->prepare('INSERT INTO avis (content) VALUES (:content)');
        $query->bindValue(':content', $avis->getContent());

        return $query->execute();
    }

    /**
     * Sélectionne toutes les données de la table SQL "avis"
     */
    public function selectAll()
    {
        $query = $this->getDb()->query('SELECT * FROM avis');
        $allAvis = $query->fetchAll();

        // Boucle sur les données reçues de la requête SQL
        foreach($allAvis as $avis) {
            $avisObject = new Entity\Avis();
            $avisObject->setId($avis['id']);
            $avisObject->setContent($avis['content']);

            // Stock chaque objet avis dans un tableau
            $objects[] = $avisObject;
        }

        return $objects ?? [];
    }

}