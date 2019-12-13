<?php

class HomeController
{
    public function __construct()
    {
    }

    public function viewHome(): void
    {
        require(__DIR__ . '/../View/viewHome.php');
    }

}