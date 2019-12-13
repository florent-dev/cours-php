<?php

// Environnement (dev, prod)
$environnement = 'dev';

// Gestion des erreurs selon l'environnement
if ($environnement === 'dev') {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once(__DIR__ . '/Controller/StructureController.php');
require_once(__DIR__ . '/Controller/SecteurController.php');

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
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'viewStructures':
                    $structure = $controler->viewStructures();
                    break;
                case 'addStructure':
                    if (isset($_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_donateurs'], $_POST['nb_actionnaires'])) {
                        $controler->addAccount();
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Secteur')) {
            $controler = new SecteurController();
            switch ($_GET['action']) {
                case 'viewSecteur':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $secteur = $controler->viewSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant<br/>';
                    }
                    break;
                case 'viewSecteurs':
                    $secteur = $controler->viewSecteurs();
                    break;
                case 'addSecteur':
                    if (isset($_POST['libelle'])) {
                        $controler->addSecteur();
                    } else {
                        $error = 'Erreur de paramètres<br/>';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue<br/>';
                    break;
            }
        } else {
            $error = 'Erreur : action non reconnue<br/>';
        }
    } else {
        ?>
        <a href='index.php?action=viewStructures'>Liste des structures</a><br/>
        <a href='index.php?action=viewSecteurs'>Liste des secteurs</a><br/>
        <?php
    }

} catch (Exception $e) {
    $error = 'Error ' . $e->getCode() . ' : ' . $e->getMessage() . '<br/>' . str_replace('\n', '<br/>', $e->getTraceAsString());
}

if (isset($error)) {
    require(__DIR__ . '/View/error.php');
}



