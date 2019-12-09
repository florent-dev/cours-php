<?php

namespace figures;

class Cercle extends Figure implements ISurface
{
    private $_centre;
    private $_rayon;

    /**
     * Cercle constructor.
     * @param string $couleur
     * @param Point $centre
     * @param float $rayon
     */
    public function __construct(string $couleur, Point $centre, float $rayon)
    {
        parent::setCouleur($couleur);
        $this->setCentre($centre);
        $this->setRayon($rayon);
    }

    /**
     * @return Point
     */
    public function getCentre(): Point
    {
        return $this->_centre;
    }

    /**
     * @param Point $centre
     */
    public function setCentre(Point $centre): void
    {
        $this->_centre = $centre;
    }

    /**
     * @return float
     */
    public function getRayon(): float
    {
        return $this->_rayon;
    }

    /**
     * @param float $rayon
     */
    public function setRayon(float $rayon): void
    {
        $this->_rayon = $rayon;
    }

    /**
     * @return float
     */
    public function calculerAire():float
    {
        return ($this->_rayon)^2 * M_PI;
    }

    public function calculerPerimetre(): float
    {
        // TODO: Implement calculerPerimetre() method.
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return "Cercle de centre $this->_centre et rayon $this->_rayon de couleur " . parent::getAstoString();
    }
}