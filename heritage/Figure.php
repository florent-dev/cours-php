<?php

namespace figures;

abstract class Figure
{
    private $_couleur;

    /**
     * @return string
     */
    public function getCouleur()
    {
        return $this->_couleur;
    }

    /**
     * @param string $couleur
     */
    public function setCouleur($couleur): void
    {
        $this->_couleur = $couleur;
    }

    public function getAstoString(): string
    {
        return $this->getCouleur();
    }

    /**
     * @return mixed
     */
    public abstract function __toString();
}