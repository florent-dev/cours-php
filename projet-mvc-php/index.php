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
require_once(__DIR__ . '/Controller/EntrepriseController.php');
require_once(__DIR__ . '/Controller/AssociationController.php');

use mvc\Controller\StructureController;
use mvc\Controller\SecteurController;
use mvc\Controller\EntrepriseController;
use mvc\Controller\AssociationController;

try {

    if (isset($_GET['action'])) {
        if (stripos($_GET['action'], 'Structure')) {
            $controler = new StructureController();
            switch ($_GET['action']) {
                case 'viewStructure':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler->viewStructure($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'viewStructures':
                    $controler->viewStructures();
                    break;
                case 'editorStructure':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    $controler->editorStructure($idStructure);
                    break;
                case 'createStructure':
                    if (isset($_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_donateurs'], $_POST['nb_actionnaires'])) {
                        $controler->createStructure();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'deleteStructure':
                    if (isset($_GET['id'])) {
                        $controler->deleteStructure($_GET['id']);
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
                        $controler->viewSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'viewSecteurs':
                    $controler->viewSecteurs();
                    break;
                case 'editorSecteur':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    if (isset($_GET['id']) && $idStructure <= 0) {
                        $error = 'Erreur : mauvais identifiant';
                    } else {
                        $controler->editorStructure($idStructure);
                    }
                    break;
                case 'createSecteur':
                    if (isset($_POST['libelle'])) {
                        $controler->createSecteur();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'updateSecteur':
                    if (isset($_POST['id'])) {
                        $controler->updateSecteur($_POST['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'deleteSecteur':
                    if (isset($_GET['id'])) {
                        $controler->deleteSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Entreprise')) {
            $controler = new EntrepriseController();
            switch ($_GET['action']) {
                case 'viewEntreprise':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler->viewEntreprise($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'viewEntreprises':
                    $controler->viewEntreprises();
                    break;
                case 'editorEntreprise':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    if (isset($_GET['id']) && $idStructure <= 0) {
                        $error = 'Erreur : mauvais identifiant';
                    } else {
                        $controler->editorEntreprise($idStructure);
                    }
                    break;
                case 'createEntreprise':
                    if (isset($_POST['libelle'])) {
                        $controler->createEntreprise();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'updateEntreprise':
                    if (isset($_POST['id'])) {
                        $controler->updateEntreprise($_POST['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Association')) {
            $controler = new AssociationController();
            switch ($_GET['action']) {
                case 'viewAssociation':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controler->viewAssociation($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'viewAssociations':
                    $controler->viewAssociations();
                    break;
                case 'editorAssociation':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    if (isset($_GET['id']) && $idStructure <= 0) {
                        $error = 'Erreur : mauvais identifiant';
                    } else {
                        $controler->editorAssociation($idStructure);
                    }
                    break;
                case 'createAssociation':
                    if (isset($_POST['libelle'])) {
                        $controler->createAssociation();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'updateAssociation':
                    if (isset($_POST['id'])) {
                        $controler->updateAssociation($_POST['id']);
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
        $controler = new StructureController();
        $controler->viewStructures();
    }

} catch
(Exception $e) {
    $error = 'Error ' . $e->getCode() . ' : ' . $e->getMessage() . '' . str_replace('\n', '', $e->getTraceAsString());
}

if (isset($error)) {
    require(__DIR__ . '/View/error.php');
}



