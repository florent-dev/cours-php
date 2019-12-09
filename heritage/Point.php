<?php

namespace figures;

class Point extends Figure
{
    private $_x;
    private $_y;

    /**
     * Point constructor.
     * @param string $couleur
     * @param float $x
     * @param float $y
     */
    public function __construct(string $couleur, float $x, float $y)
    {
        parent::setCouleur($couleur);
        $this->_x = $x;
        $this->_y = $y;
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->_x;
    }

    /**
     * @param float $x
     */
    public function setX($x): void
    {
        $this->_x = $x;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->_y;
    }

    /**
     * @param float $y
     */
    public function setY($y): void
    {
        $this->_y = $y;
    }

    public function __toString()
    {
        return "Point ($this->x ; $this->_y) de couleur " . parent::getAstoString();
    }

}