<?php

namespace mvc\Controller;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/EntrepriseManager.php');

use Model\Entity\Entreprise;
use Model\Entity\Secteur;
use mvc\Model\Manager\EntrepriseManager;
use mvc\Model\Manager\SecteurManager;


class EntrepriseController extends SController
{
    public function __construct()
    {
        $this->manager = new EntrepriseManager();
    }

    public function viewEntreprises(): void
    {
        $structures = $this->findAll();

        require(__DIR__ . '/../View/viewStructures.php');
    }

    public function viewEntreprise($id): void
    {
        $structure = $this->findById($id);

        require(__DIR__ . '/../View/viewStructure.php');
    }

    public function editorEntreprise($id): void
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

    public function createEntreprise(): void
    {
        $structure = new Entreprise(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_actionnaires']);
        $this->insert($structure);
        header('Location: index.php?action=viewSecteurs');
    }

    public function updateEntreprise($id): void
    {
        $secteur = $this->findById($id);

        if (null !== $secteur) {
            $secteur->setLibelle($_POST['libelle']);
            $this->update($secteur);
        }

        header('Location: index.php?action=viewSecteurs');
    }

    public function deleteEntreprise($id): void
    {
        $secteur = $this->findById($id);

        if (null !== $secteur) {
            $this->delete($secteur);
        }

        header('Location: index.php?action=viewSecteurs');
    }
}
