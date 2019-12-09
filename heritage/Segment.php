<?php

namespace figures;

class Segment extends Figure
{
    private $_p1;
    private $_p2;

    public function __construct(string $couleur, Point $p1, Point $p2)
    {
        parent::setCouleur($couleur);
        $this->setP1($p1);
        $this->setP2($p2);
    }

    /**
     * @return Point
     */
    public function getP1(): Point
    {
        return $this->_p1;
    }

    /**
     * @param Point $p1
     */
    public function setP1($p1)
    {
        $this->_p1 = $p1;
    }

    /**
     * @return Point
     */
    public function getP2(): Point
    {
        return $this->_p2;
    }

    /**
     * @param Point $p2
     */
    public function setP2($p2)
    {
        $this->_p2 = $p2;
    }

    /**
     * Retourne la longueur entre deux points
     * @return float
     */
    public function getLongueur(): float
    {
        function sqr($a) {
            return $a*$a;
        }

        return sqrt(sqr($this->_p2->getY() - $this->_p1->getY()) + sqr($this->_p2->getX() - $this->_p1->getX()));
    }
}