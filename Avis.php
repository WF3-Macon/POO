<?php

require_once 'Db.php';

class Avis extends Db {

    public function insert(string $avis)
    {
        // Nettoie la chaîne de caractère
        $avis = htmlspecialchars(strip_tags($avis));

        try {
            // Insert en BDD
            $query = $this->getDb()->prepare('INSERT INTO avis (content) VALUES (:content)');
            $query->bindValue(':content', $avis);
        }
        catch(Exception $exception) {
            die("Erreur lors de l'insertion : {$exception->getMessage()}");
        }
        
        // execute() retourne true en cas de succès ou false si erreur
        return $query->execute();
    }

}