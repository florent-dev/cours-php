<?php

namespace figures;

class Carre extends Rectangle
{
    /**
     * @return mixed
     */
    public function __toString()
    {
        return "Carré de côté " . parent::getAstoString();
    }
}