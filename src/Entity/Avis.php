<?php

/**
 * Les espaces de noms permettent de différencier des classes PHP
 * portant le même nom
 */
namespace Entity;

/**
 * Cette classe représente l'architecture de la table SQL "avis"
 */
class Avis {

    private int $id;
    private string $content;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }
}