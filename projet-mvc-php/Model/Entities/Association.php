<?php

namespace Model\Entity;

require_once 'Structure.php';

use Model\Entities\Structure;


class Association extends Structure
{

    //Attributs
    private $nbdonateurs;

    //Constructeur
    public function __construct($id, $nom, $rue, $cp, $ville, $estAssocie, $nbDonateurs)
    {
        parent::__construct($id, $nom, $rue, $cp, $ville, $estAssocie);
        $this->nbdonateurs=$nbDonateurs;
    }

    /**
     * @param mixed $nbdonateurs
     */
    public function setNbdonateurs($nbdonateurs): void
    {
        $this->nbdonateurs = $nbdonateurs;
    }

    /**
     * @return mixed
     */
    public function getNbdonateurs()
    {
        return $this->nbdonateurs;
    }
}