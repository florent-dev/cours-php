<?php

namespace mvc\Controller;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/SecteurManager.php');

use Model\Entity\Secteur;
use mvc\Model\Manager\SecteurManager;


class SecteurController extends SController
{
    public function __construct()
    {
        $this->manager = new SecteurManager();
    }

    public function viewSecteurs(): void
    {
        $title = 'Liste des secteurs';
        $secteurs = $this->findAll();

        require(__DIR__ . '/../View/viewSecteurs.php');
    }

    public function viewSecteur($id): void
    {
        $title = 'Détail du secteur';
        $secteur = $this->findById($id);

        require(__DIR__ . '/../View/viewSecteur.php');
    }

    public function addSecteur(): void
    {
        $structure = new Secteur(null, $_POST['libelle']);
        $this->insert($structure);
        header('Location: index.php?action=viewSecteurs');
    }
}
