<?php


class MoyenneModule
{
    private $_etudiant;
    private $_module;
    private $_moyenne;

    /**
     * MoyenneModule constructor.
     * @param Etudiant $etudiant
     * @param Module $module
     * @param float $moyenne
     */
    public function __construct(Etudiant $etudiant, Module $module, float $moyenne)
    {
        $this->_etudiant = $etudiant;
        $this->_module = $module;
        $this->_moyenne = $moyenne;
    }

    /**
     * @return float
     */
    public function getMoyenne(): float
    {
        return $this->_moyenne;
    }

    /**
     * @return Module
     */
    public function getModule(): Module
    {
        return $this->_module;
    }
}