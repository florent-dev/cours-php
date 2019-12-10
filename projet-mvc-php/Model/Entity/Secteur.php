<?php

namespace Model\Entity;

use mvc\model\entities\Entity;

class Secteur extends Entity {

    private $_int;
    private $_nom;
    private $_rue;
    private $_cp;

    //Constructeur
    public function __construct($int, $nom,$rue,$cp) {
        $this->_int=$int;
        $this->_nom=$nom;
        $this->_rue=$rue;
        $this->_cp=$cp;
    }

    //Getteurs
    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->_cp;
    }

    /**
     * @return mixed
     */
    public function getInt()
    {
        return $this->_int;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    //Setteurs
    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->_rue;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->_cp = $cp;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->_rue = $rue;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @param mixed $int
     */
    public function setInt($int)
    {
        $this->_int = $int;
    }

}