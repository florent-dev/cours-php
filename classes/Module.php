<?php


class Module
{
    private $_nom;
    private $_coefficient;

    /**
     * Module constructor.
     * @param string $nom
     * @param int $coefficient
     */
    public function __construct(string $nom, int $coefficient)
    {
        $this->_nom = $nom;
        $this->_coefficient = $coefficient;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->_nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    /**
     * @return int
     */
    public function getCoefficient(): int
    {
        return $this->_coefficient;
    }

    /**
     * @param int $coefficient
     */
    public function setCoefficient(int $coefficient): void
    {
        $this->_coefficient = $coefficient;
    }
}