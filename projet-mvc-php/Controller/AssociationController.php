<?php

namespace mvc\Controller;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/AssociationManager.php');

use Model\Entity\Association;
use mvc\Model\Manager\AssociationManager;
use mvc\Model\Manager\SecteurManager;

class AssociationController extends SController
{
    private $_secteurManager;

    public function __construct()
    {
        $this->manager = new AssociationManager();
        $this->_secteurManager = new SecteurManager();
    }

    public function viewAssociations(): void
    {
        $associations = $this->findAll();

        require(__DIR__ . '/../View/viewAssociations.php');
    }

    public function viewAssociation($id): void
    {
        $structure = $this->findById($id);

        require(__DIR__ . '/../View/viewAssociation.php');
    }

    public function editorAssociation($id): void
    {
        $secteurs = $this->_secteurManager->findAll(\PDO::FETCH_ASSOC);
        $association = (null !== $id) ? $this->findById($id) : null;
        $action = 'index.php?action=';

        if (null === $association) {
            $title = 'Créer l\'association';
            $action .= 'createAssociation';
        } else {
            $title = 'Modifier l\'association n°' . $association->getId();
            $action .= 'updateAssociation&id=' . $association->getId();
        }

        require(__DIR__ . '/../View/editorAssociation.php');
    }

    public function createAssociation(): void
    {
        $structure = new Association(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], 1, $_POST['nb_donateurs']);
        $this->insert($structure);
        header('Location: index.php?action=viewAssociations');
    }

    public function updateAssociation($id): void
    {
        $association = $this->findById($id);

        if (null !== $association) {
            $association->setNom($_POST['nom']);
            $association->setRue($_POST['rue']);
            $association->setCp($_POST['cp']);
            $association->setVille($_POST['ville']);
            $association->setNbDonateurs($_POST['nb_donateurs']);
            $this->update($association);
        }

        header('Location: index.php?action=viewAssociations');
    }
}
