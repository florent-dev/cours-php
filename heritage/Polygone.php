<?php


namespace figures;


class Polygone extends Figure implements ISurface
{
    private $_cotes;

    public function __construct(string $couleur, array $cotes)
    {
        parent::setCouleur($couleur);
        $this->setSegments($cotes);
    }

    /**
     * @return array
     */
    public function getSegments(): array
    {
        return $this->_cotes;
    }

    /**
     * @param array $cotes
     */
    public function setSegments(array $cotes): void
    {
        $this->_cotes = $cotes;
    }

    public function calculerAire(): float
    {
        // TODO: Implement calculerAire() method.
    }

    public function calculerPerimetre(): float
    {
        // TODO: Implement calculerPerimetre() method.
    }
}