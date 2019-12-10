<?php

namespace Model\Entity;


use mvc\model\entities\Entity;

class Structure extends Entity {

    private $_id;
    private $_nom;
    private $_rue;
    private $_cp;
    private $_ville;
    private $_estAssocie;
    private $_nbDonateurs;
    private $_nbActionnaires;

    //Controleur
    public function __construct($id,$nom,$rue,$cp,$ville,$estAssocie,$nbDonateurs,$nbActionnaires) {
        $this->_id=$id;
        $this->_nom=$nom;
        $this->_rue=$rue;
        $this->_cp=$cp;
        $this->_ville=$ville;
        $this->_estAssocie=$estAssocie;
        $this->_nbDonateurs=$nbDonateurs;
        $this->_nbActionnaires=$nbActionnaires;
    }

    //Getteurs
    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->_ville;
    }

    /**
     * @return mixed
     */
    public function getSecteur()
    {
        return $this->_secteur;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->_rue;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getNbDonateurs()
    {
        return $this->_nbDonateurs;
    }

    /**
     * @return mixed
     */
    public function getNbActionnaires()
    {
        return $this->_nbActionnaires;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getEstAssocie()
    {
        return $this->_estAssocie;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->_cp;
    }

    //Setteurs
    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->_ville = $ville;
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
     * @param mixed $nbDonnateurs
     */
    public function setNbDonateurs($nbDonnateurs)
    {
        $this->_nbDonateurs = $nbDonnateurs;
    }

    /**
     * @param mixed $nbActionnaires
     */
    public function setNbActionnaires($nbActionnaires)
    {
        $this->_nbActionnaires = $nbActionnaires;
    }

    /**
     * @param mixed $int
     */
    public function setId($int)
    {
        $this->_id = $int;
    }

    /**
     * @param mixed $estAssocie
     */
    public function setEstAssocie($estAssocie)
    {
        $this->_estAssocie = $estAssocie;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->_cp = $cp;
    }






}