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

    public function editorStructure($id): void
    {
        $secteur = (null !== $id) ? $this->findById($id) : null;
        $action = 'index.php?action=';

        if (null === $secteur) {
            $title = 'Créer le secteur';
            $action .= 'createSecteur';
        } else {
            $title = 'Modifier le secteur n°' . $secteur->getId();
            $action .= 'updateSecteur&id=' . $secteur->getId();
        }

        require(__DIR__ . '/../View/editorSecteur.php');
    }

    public function createSecteur(): void
    {
        $structure = new Secteur(null, $_POST['libelle']);
        $this->insert($structure);
        header('Location: index.php?action=viewSecteurs');
    }

    public function updateSecteur($id): void
    {
        $secteur = $this->findById($id);

        if (null !== $secteur) {
            $secteur->setLibelle($_POST['libelle']);
            $this->update($secteur);
        }

        header('Location: index.php?action=viewSecteurs');
    }

    public function deleteSecteur($id): void
    {
        $secteur = $this->findById($id);

        if (null !== $secteur) {
            $this->delete($secteur);
        }

        header('Location: index.php?action=viewSecteurs');
    }
}
