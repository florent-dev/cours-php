<?php

// Environnement (dev, prod)
$environnement = 'dev';

// Gestion des erreurs selon l'environnement
if ($environnement === 'dev') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once(__DIR__ . '/Controller/HomeController.php');
require_once(__DIR__ . '/Controller/SecteurController.php');
require_once(__DIR__ . '/Controller/StructureController.php');

use mvc\Controller\StructureController;
use mvc\Controller\SecteurController;

try {

    if (isset($_GET['action'])) {
        if (stripos($_GET['action'], 'Structure')) {
            $controler = new StructureController();
            switch ($_GET['action']) {
                case 'viewStructure':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $structure = $controler->viewStructure($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'viewStructures':
                    $structure = $controler->viewStructures();
                    break;
                case 'addStructure':
                    if (isset($_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_donateurs'], $_POST['nb_actionnaires'])) {
                        $controler->addStructure();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Secteur')) {
            $controler = new SecteurController();
            switch ($_GET['action']) {
                case 'viewSecteur':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $secteur = $controler->viewSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'viewSecteurs':
                    $secteur = $controler->viewSecteurs();
                    break;
                case 'addSecteur':
                    if (isset($_POST['libelle'])) {
                        $controler->addSecteur();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } else {
            $error = 'Erreur : action non reconnue';
        }
    } else {
        $controler = new HomeController();
        $controler->viewHome();
    }

} catch (Exception $e) {
    $error = 'Error ' . $e->getCode() . ' : ' . $e->getMessage() . '' . str_replace('\n', '', $e->getTraceAsString());
}

if (isset($error)) {
    require(__DIR__ . '/View/error.php');
}



