<?php

namespace Model\Entity;

require_once 'Structure.php';

use Model\Entities\Structure;


class Association extends Structure
{
    public static $TYPESTRUCTURE = 'Association';

    // Attributs
    private $nbDonateurs;

    // Constructeur
    public function __construct($id, $nom, $rue, $cp, $ville, $estAssocie, $nbDonateurs)
    {
        parent::__construct($id, $nom, $rue, $cp, $ville, $estAssocie);
        $this->nbDonateurs = $nbDonateurs;
    }

    /**
     * @param int $nbDonateurs
     */
    public function setNbDonateurs($nbDonateurs): void
    {
        $this->nbDonateurs = $nbDonateurs;
    }

    /**
     * @return int
     */
    public function getNbDonateurs()
    {
        return $this->nbDonateurs;
    }
}