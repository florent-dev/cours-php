<?php

namespace mvc\Controller;

use Model\Entities\Structure;
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
        $title = 'Liste des structures';
        $structures = $this->findAll();

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

    public function addStructure(): void
    {
        $structure = new Structure(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_donateurs'], $_POST['nb_actionnaires']);
        $this->insert($structure);
        header('Location: index.php?action=viewStructures');
    }
}
