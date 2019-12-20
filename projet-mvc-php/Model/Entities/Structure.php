<?php

namespace Model\Entities;

require_once 'Entity.php';

use Model\Entity\Secteur;
use mvc\Model\Entities\Entity;

abstract class Structure extends Entity
{
    public static $TYPESTRUCTURE = 'Structure';

    private $_id;
    private $_nom;
    private $_rue;
    private $_cp;
    private $_ville;
    private $_estasso;

    public function __construct($id, $nom, $rue, $cp, $ville, $estAssocie)
    {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_rue = $rue;
        $this->_cp = $cp;
        $this->_ville = $ville;
        $this->_estasso = $estAssocie;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->_ville;
    }

    /**
     * @return int
     */
    public function getRue()
    {
        return $this->_rue;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return bool
     */
    public function getEstasso()
    {
        return (bool) $this->_estasso;
    }

    /**
     * @return int
     */
    public function getCp()
    {
        return $this->_cp;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->_ville = $ville;
    }

    /**
     * @param int $rue
     */
    public function setRue($rue)
    {
        $this->_rue = $rue;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @param int $int
     */
    public function setId($int)
    {
        $this->_id = $int;
    }

    /**
     * @param bool $estAssocie
     */
    public function setEstasso($estAssocie)
    {
        $this->_estasso = $estAssocie;
    }

    /**
     * @param int $cp
     */
    public function setCp($cp)
    {
        $this->_cp = $cp;
    }

}