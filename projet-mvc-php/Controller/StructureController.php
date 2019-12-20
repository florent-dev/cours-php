<?php

namespace mvc\Controller;

use Model\Entities\Structure;
use Model\Entity\Association;
use Model\Entity\Entreprise;
use mvc\Model\Manager\SecteurManager;
use mvc\Model\Manager\StructureManager;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/StructureManager.php');

use mvc\Controller\SController;

class StructureController extends SController
{
    private $_secteurManager;

    public function __construct()
    {
        $this->manager = new StructureManager();
        $this->_secteurManager = new SecteurManager();
    }

    public function viewStructures(): void
    {
        $structures = $this->findAll();
        $struct=true;

        $secteurs = $this->_secteurManager->findAll(\PDO::FETCH_ASSOC);

        require(__DIR__ . '/../View/viewStructures.php');
    }

    public function viewStructure($id): void
    {
        $title = 'Détail de la structure';
        $structure = $this->findById($id);

        $secteurStructure = $this->_secteurManager->findAll(\PDO::FETCH_ASSOC);

        require(__DIR__ . '/../View/viewStructure.php');
    }

    public function editorStructure($id): void
    {
        $structure = (null !== $id) ? $this->findById($id) : null;
        $action = 'index.php?action=';

        if (null === $structure) {
            $title = 'Créer la structure';
            $action .= 'createStructure';
            $secteurs = $this->_secteurManager->findAll(\PDO::FETCH_ASSOC);
        } else {
            $title = 'Modifier la structure n°' . $structure->getId();
            $action .= 'updateStructure&id=' . $structure->getId();
        }

        require(__DIR__ . '/../View/editorStructure.php');
    }

    public function createStructure(): void
    {
        if ( isset($_POST['estasso']) ) {
            $_POST['estasso'] = (int) $_POST['estasso'];
            var_dump($_POST['estasso']);
            $structure = ($_POST['estasso'] === 1)
                ? new Association(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], '1', $_POST['nb_actionnaires'])
                : new Entreprise(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], '0', $_POST['nb_donateurs'])
            ;
            $this->insert($structure);
        }
        header('Location: index.php?action=viewStructures');
    }

    public function updateStructure($id): void
    {
        $structure = $this->findById($id);

        if (null !== $structure) {
            $structure->setNom($_POST['nom']);
            $structure->setRue($_POST['rue']);
            $structure->setCp($_POST['cp']);
            $structure->setVille($_POST['ville']);
            $structure->setEstasso($_POST['estasso']);

            ($structure->getEstasso() == 1) ? $structure->setNbDonateurs($_POST['nb_donateurs']) : $structure->setNbActionnaires($_POST['nb_actionnaires']);

            $this->update($structure);
        }

        header('Location: index.php?action=viewStructures');
    }

    public function deleteStructure($id): void
    {
        $structure = $this->findById($id);

        if (null !== $structure) {
            $this->delete($structure);
        }

        header('Location: index.php?action=viewStructures');
    }
}
