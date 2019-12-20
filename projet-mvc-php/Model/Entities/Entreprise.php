<?php

namespace Model\Entity;

require_once 'Entreprise.php';

use Model\Entities\Structure;


class Entreprise extends Structure
{
    public static $TYPESTRUCTURE = 'Entreprise';
    // Attributs
    private $nbActionnaires;

    // Constructeur
    public function __construct($id, $nom, $rue, $cp, $ville, $estAssocie, $nbActionnaires)
    {
        parent::__construct($id, $nom, $rue, $cp, $ville, $estAssocie);
        $this->nbActionnaires = $nbActionnaires;
    }

    /**
     * @param int $nbActionnaires
     */
    public function setNbActionnaires($nbActionnaires): void
    {
        $this->nbActionnaires = $nbActionnaires;
    }

    /**
     * @return int
     */
    public function getNbActionnaires()
    {
        return $this->nbActionnaires;
    }
}