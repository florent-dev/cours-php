<?php

namespace Model\Entity;

require_once('Entity.php');

use mvc\Model\Entities\Entity;

class Secteur extends Entity
{
    private $_int;
    private $_nom;
    private $_rue;
    private $_cp;

    public function __construct($int, $nom, $rue, $cp)
    {
        $this->_int = $int;
        $this->_nom = $nom;
        $this->_rue = $rue;
        $this->_cp = $cp;
    }

    /**
     * @return int
     */
    public function getCp()
    {
        return $this->_cp;
    }

    /**
     * @return int
     */
    public function getInt()
    {
        return $this->_int;
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
    public function getRue()
    {
        return $this->_rue;
    }

    /**
     * @param int $cp
     */
    public function setCp($cp)
    {
        $this->_cp = $cp;
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
    public function setInt($int)
    {
        $this->_int = $int;
    }

}