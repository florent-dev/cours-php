<?php

namespace Model\Entity;

require_once 'Entreprise.php';

use Model\Entities\Structure;


class Entreprise extends Structure
{
    //Attributs
    private $nbactionnaires;

    //Constructeur
    public function __construct($id, $nom, $rue, $cp, $ville, $estAssocie,$nbActionnaires)
    {
        parent::__construct($id, $nom, $rue, $cp, $ville, $estAssocie);
        $this->nbactionnaires=$nbActionnaires;
    }

    /**
     * @param mixed $nbactionnaires
     */
    public function setNbactionnaires($nbactionnaires): void
    {
        $this->nbactionnaires = $nbactionnaires;
    }

    /**
     * @return mixed
     */
    public function getNbactionnaires()
    {
        return $this->nbactionnaires;
    }
}