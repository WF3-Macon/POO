<?php

require_once 'Db.php';

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

}