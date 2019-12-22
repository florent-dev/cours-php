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

use mvc\Controller\HomeController;
use mvc\Controller\StructureController;
use mvc\Controller\SecteurController;
use mvc\Controller\EntrepriseController;
use mvc\Controller\AssociationController;

try {

    if (isset($_GET['action'])) {
        if (stripos($_GET['action'], 'Structure')) {
            $controller = new StructureController();
            switch ($_GET['action']) {
                case 'viewStructures':
                    $controller->viewStructures();
                    break;
                case 'deleteStructure':
                    if (isset($_GET['id'])) {
                        $controller->deleteStructure($_GET['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Secteur')) {
            $controller = new SecteurController();
            switch ($_GET['action']) {
                case 'viewSecteurs':
                    $controller->viewSecteurs();
                    break;
                case 'viewSecteur':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controller->viewSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'editorSecteur':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    if (isset($_GET['id']) && $idStructure <= 0) {
                        $error = 'Erreur : mauvais identifiant';
                    } else {
                        $controller->editorSecteur($idStructure);
                    }
                    break;
                case 'createSecteur':
                    if (isset($_POST['libelle'])) {
                        $controller->createSecteur();
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'updateSecteur':
                    if (isset($_POST['id'])) {
                        $controller->updateSecteur($_POST['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                case 'deleteSecteur':
                    if (isset($_GET['id'])) {
                        $controller->deleteSecteur($_GET['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default :
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Entreprise')) {
            $controller = new EntrepriseController();
            switch ($_GET['action']) {
                case 'viewEntreprises':
                    $controller->viewEntreprises();
                    break;
                case 'viewEntreprise':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controller->viewEntreprise($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'editorEntreprise':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    if (isset($_GET['id']) && $idStructure <= 0) {
                        $error = 'Erreur : mauvais identifiant';
                    } else {
                        $controller->editorEntreprise($idStructure);
                    }
                    break;
                case 'createEntreprise':
                    $controller->createEntreprise();
                    break;
                case 'updateEntreprise':
                    if (isset($_POST['id'])) {
                        $controller->updateEntreprise($_POST['id']);
                    } else {
                        $error = 'Erreur de paramètres';
                    }
                    break;
                default:
                    $error = 'Erreur : action non reconnue';
                    break;
            }
        } elseif (stripos($_GET['action'], 'Association')) {
            $controller = new AssociationController();
            switch ($_GET['action']) {
                case 'viewAssociations':
                    $controller->viewAssociations();
                    break;
                case 'viewAssociation':
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $controller->viewAssociation($_GET['id']);
                    } else {
                        $error = 'Erreur : mauvais identifiant';
                    }
                    break;
                case 'editorAssociation':
                    $idStructure = (isset($_GET['id'])) ? $_GET['id'] : null;
                    if (isset($_GET['id']) && $idStructure <= 0) {
                        $error = 'Erreur : mauvais identifiant';
                    } else {
                        $controller->editorAssociation($idStructure);
                    }
                    break;
                case 'createAssociation':
                    $controller->createAssociation();
                    break;
                case 'updateAssociation':
                    if (isset($_POST['id'])) {
                        $controller->updateAssociation($_POST['id']);
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
        $controller = new HomeController();
        $controller->viewHome();
    }

} catch
(Exception $e) {
    $error = 'Error ' . $e->getCode() . ' : ' . $e->getMessage() . '' . str_replace('\n', '', $e->getTraceAsString());
}

if (isset($error)) {
    require(__DIR__ . '/View/error.php');
}



