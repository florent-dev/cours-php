<?php


class MoyennesEtudiant
{
    private $_moyenneModules;

    /**
     * MoyennesEtudiant constructor.
     * @param array $moyenneModules
     */
    public function __construct(array $moyenneModules)
    {
        $this->_moyenneModules = $moyenneModules;
    }

    /**
     * Calcule la moyenne générale avec les coeffs de chaque module
     * @return float|int
     */
    public function calculerMoyenne() {
        $sommeMoy = 0;
        $sommeCoeff = 0;
        foreach ($this->_moyenneModules as $moyenneModule) {
            $sommeMoy += $moyenneModule->getMoyenne() * $moyenneModule->getModule()->getCoefficient();
            $sommeCoeff += $moyenneModule->getModule()->getCoefficient();
        }
        return $sommeMoy / $sommeCoeff;
    }

    /**
     * Retourne la moyenne générale de l'étudiant
     */
    public function __toString()
    {
        echo strval($this->calculerMoyenne());
    }

}