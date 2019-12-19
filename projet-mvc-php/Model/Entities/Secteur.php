<?php

namespace Model\Entity;

require_once 'Entity.php';

use mvc\Model\Entities\Entity;

class Secteur extends Entity
{
    //Attributs
    private $_id;
    private $_libelle;

    //Constructeur
    public function __construct($id, $libelle)
    {
        $this->_id = $id;
        $this->_libelle = $libelle;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->_libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->_libelle = $libelle;
    }
}