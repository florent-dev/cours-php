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
        $terminologie = ['singulier' => 'association', 'pluriel' => 'associations'];

        require(__DIR__ . '/../View/viewStructures.php');
    }

    public function viewAssociation($id): void
    {
        $structure = $this->findById($id);

        require(__DIR__ . '/../View/viewStructure.php');
    }

    public function editorAssociation($id): void
    {

        $structure = (null !== $id) ? $this->findById($id) : null;
        $action = 'index.php?action=';

        if (null === $structure) {
            $title = 'Créer l\'association';
            $action .= 'createAssociation';
        } else {
            $title = 'Modifier l\'association n°' . $structure->getId();
            $action .= 'updateAssociation&id=' . $structure->getId();
        }

        require(__DIR__ . '/../View/editorStructure.php');
    }

    public function createAssociation(): void
    {
        $structure = new Association(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_donateurs']);
        $this->insert($structure);
        header('Location: index.php?action=viewAssociations');
    }

    public function updateAssociation($id): void
    {
        $association = $this->findById($id);

        if (null !== $association) {
            $association->setLibelle($_POST['libelle']);
            $this->update($association);
        }

        header('Location: index.php?action=viewAssociations');
    }

    public function deleteAssociation($id): void
    {
        $association = $this->findById($id);

        if (null !== $association) {
            $this->delete($association);
        }

        header('Location: index.php?action=viewAssociations');
    }
}
