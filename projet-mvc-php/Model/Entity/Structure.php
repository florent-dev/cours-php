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

    public function __construct() {
        // TODO
    }

    public function getInt(){
        return $this->_int;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function getRue(){
        return $this->_int;
    }

    public function getCp(){
        return $this->_cp;
    }

    public function getVille(){
        return $this->_ville;
    }

    public function getEstAssocie(){
        return $this->_estAssocie;
    }

    public function getNbDonnateurs(){
        return $this->_nbDonnateurs;
    }

    public function getNbActionnaires(){
        return $this->_nbActionnaires;
    }

    public function getSecteur(){
        return $this->_secteur;
    }






}