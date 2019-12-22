<?php

namespace mvc\Controller;

use mvc\Model\Manager\SecteurManager;
use mvc\Model\Manager\SecteursStructuresManager;
use mvc\Model\Manager\StructureManager;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/StructureManager.php');
require_once(__DIR__ . '/../Model/Manager/SecteursStructuresManager.php');
require_once(__DIR__ . '/../Model/Entities/SecteursStructures.php');

use mvc\Controller\SController;

class StructureController extends SController
{
    private $_secteurManager;
    private $_secteursStructuresManager;

    public function __construct()
    {
        $this->manager = new StructureManager();
        $this->_secteurManager = new SecteurManager();
        $this->_secteursStructuresManager = new SecteursStructuresManager();
    }

    public function deleteStructure($id): void
    {
        $structure = $this->findById($id);

        if (null !== $structure) {
            $this->_secteursStructuresManager->deleteByIdStructure($structure->getId());
            $this->delete($structure);
        }

        header('Location: index.php?action=view'.$structure->__toString().'s');
    }
}
