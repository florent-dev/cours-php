<?php

namespace Model\Entity;


class Structure {

    private $_int;
    private $_nom;
    private $_rue;
    private $_cp;
    private $_ville;
    private $_estAssocie;
    private $_nbDonnateurs;
    private $_nbActionnaires;
    private $_secteur;

    //Controleur
    public function __construct($int,$nom,$rue,$cp,$ville,$estAssocie,$nbDonnateurs,$nbActionnaires,$secteur) {
        $this->_int=$int;
        $this->_nom=$nom;
        $this->_rue=$rue;
        $this->_cp=$cp;
        $this->_ville=$ville;
        $this->_estAssocie=$estAssocie;
        $this->_nbDonnateurs=$nbDonnateurs;
        $this->_nbActionnaires=$nbActionnaires;
        $this->_secteur=$secteur;
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
    public function getNbDonnateurs()
    {
        return $this->_nbDonnateurs;
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
    public function getInt()
    {
        return $this->_int;
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
     * @param mixed $secteur
     */
    public function setSecteur($secteur)
    {
        $this->_secteur = $secteur;
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
    public function setNbDonnateurs($nbDonnateurs)
    {
        $this->_nbDonnateurs = $nbDonnateurs;
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
    public function setInt($int)
    {
        $this->_int = $int;
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