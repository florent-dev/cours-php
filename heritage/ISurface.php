<?php

namespace figures;

interface ISurface
{
    public function calculerPerimetre(): float;
    public function calculerAire(): float;
}