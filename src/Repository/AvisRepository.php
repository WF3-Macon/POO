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

    /**
     * Supprimer un avis
     */
    public function remove(int $id)
    {
        $query = $this->getDb()->prepare('DELETE FROM avis WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        return $query->execute();
    }

    /**
     * Sélection un enregistrement selon son ID
     */
    public function selectOne(int $id)
    {
        $query = $this->getDb()->prepare('SELECT * FROM avis WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        // Stocker le résultat dans une variable
        $avis = $query->fetch();

        // Si la variable "$avis" est différente de "false", alors on créer un objet
        // avec l'entité "Avis"
        if ($avis) {
            $avisObject = (new Entity\Avis())
                ->setId($avis['id'])
                ->setContent($avis['content']);
        }

        // On retourne soit l'enregistrement sous forme d'objet ou "false"
        return $avisObject ?? false;
    }

    /**
     * Met à jour en base de données
     */
    public function update(Entity\Avis $avis)
    {
        $query = $this->getDb()->prepare('UPDATE avis SET content = :content WHERE id = :id');
        $query->bindValue(':id', $avis->getId(), PDO::PARAM_INT);
        $query->bindValue(':content', $avis->getContent());

        return $query->execute();
    }

}