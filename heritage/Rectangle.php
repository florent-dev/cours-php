<?php

namespace figures;

class Rectangle extends Polygone
{
    private $_longueur;
    private $_largeur;

    public function __construct(string $couleur, Segment $s1, Segment $s2)
    {
        parent::__construct($couleur);
        $this->_longueur = $s1;
        $this->_largeur = $s2;
    }

    public function calculerAire():float
    {
        // TODO: Implement calculerAire() method.
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return "Rectangle longueur $this->_longueur et largeur $this->_largeur et de couleur " . parent::getAstoString();
    }
}