<?php

try {
    if (!file_exists('Controller/'.$_SERVER['REQUEST_URI'].'.php')) {
        echo '404 not found';
    } else {
        include('Controller/'.strtoupper($_SERVER['REQUEST_URI']).'Controller.php');
    }
} catch (Exception $e) {
    //include ('View/404.php');
    echo 'Ce fichier n\'existe pas !';
}