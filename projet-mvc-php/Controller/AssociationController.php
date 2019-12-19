<?php

namespace mvc\Controller;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/AssociationManager.php');

use Model\Entity\Association;
use mvc\Model\Manager\AssociationManager;

class AssociationController extends SController
{
    public function __construct()
    {
        $this->manager = new AssociationManager();
    }

    public function viewAssociations(): void
    {
        $structures = $this->findAll();

        require(__DIR__ . '/../View/viewStructures.php');
    }

    public function viewAssociation($id): void
    {
        $structure = $this->findById($id);

        require(__DIR__ . '/../View/viewStructure.php');
    }

    public function editorAssociation($id): void
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

    public function createAssociation(): void
    {
        $structure = new Association(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_donateurs']);
        $this->insert($structure);
        header('Location: index.php?action=viewSecteurs');
    }

    public function updateAssociation($id): void
    {
        $secteur = $this->findById($id);

        if (null !== $secteur) {
            $secteur->setLibelle($_POST['libelle']);
            $this->update($secteur);
        }

        header('Location: index.php?action=viewSecteurs');
    }

    public function deleteAssociation($id): void
    {
        $secteur = $this->findById($id);

        if (null !== $secteur) {
            $this->delete($secteur);
        }

        header('Location: index.php?action=viewSecteurs');
    }
}
