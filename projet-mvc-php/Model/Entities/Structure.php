<?php

namespace Model\Entities;

require_once 'Entity.php';

use Model\Entity\Secteur;
use mvc\Model\Entities\Entity;

class Structure extends Entity
{
    private $_id;
    private $_nom;
    private $_rue;
    private $_cp;
    private $_ville;
    private $_estAssocie;
    private $_nbDonateurs;
    private $_nbActionnaires;

    public function __construct($id, $nom, $rue, $cp, $ville, $estAssocie, $nbDonateurs, $nbActionnaires)
    {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_rue = $rue;
        $this->_cp = $cp;
        $this->_ville = $ville;
        $this->_estAssocie = $estAssocie;
        $this->_nbDonateurs = $nbDonateurs;
        $this->_nbActionnaires = $nbActionnaires;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->_ville;
    }

    /**
     * @return Secteur
     */
    public function getSecteur()
    {
        return $this->_secteur;
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
    public function getNbDonateurs()
    {
        return $this->_nbDonateurs;
    }

    /**
     * @return int
     */
    public function getNbActionnaires()
    {
        return $this->_nbActionnaires;
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
    public function getEstAssocie()
    {
        return $this->_estAssocie;
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
     * @param int $nbDonnateurs
     */
    public function setNbDonateurs($nbDonnateurs)
    {
        $this->_nbDonateurs = $nbDonnateurs;
    }

    /**
     * @param int $nbActionnaires
     */
    public function setNbActionnaires($nbActionnaires)
    {
        $this->_nbActionnaires = $nbActionnaires;
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
    public function setEstAssocie($estAssocie)
    {
        $this->_estAssocie = $estAssocie;
    }

    /**
     * @param int $cp
     */
    public function setCp($cp)
    {
        $this->_cp = $cp;
    }

}