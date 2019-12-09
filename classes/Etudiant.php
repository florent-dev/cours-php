<?php


/**
 * Class Etudiant
 */
class Etudiant {
    private $_nom;
    private $_prenom;
    private $_age;

    /**
     * Etudiant constructor.
     * @param $nom
     * @param $prenom
     * @param $age
     */
    public function __construct($nom, $prenom, $age)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_age = $age;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->_nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->_prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->_prenom = $prenom;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->_age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->_age = $age;
    }
}