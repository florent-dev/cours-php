<?php

namespace mvc\Controller;

use mvc\Controller\SController;
use mvc\Model\Manager\SecteurManager;
use mvc\Model\Manager\SecteursStructuresManager;
use mvc\Model\Manager\StructureManager;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/StructureManager.php');
require_once(__DIR__ . '/../Model/Manager/SecteursStructuresManager.php');
require_once(__DIR__ . '/../Model/Entities/SecteursStructures.php');

class HomeController extends SController
{
    private $_structureManager;
    private $_secteurManager;
    private $_secteursStructuresManager;

    public function __construct()
    {
        $this->_structureManager = new StructureManager();
        $this->_secteurManager = new SecteurManager();
        $this->_secteursStructuresManager = new SecteursStructuresManager();
    }

    public function viewHome(): void
    {
        $structures = $this->_structureManager->findAll(\PDO::FETCH_ASSOC);
        $secteurs = $this->_secteurManager->findAll(\PDO::FETCH_ASSOC);

        require(__DIR__ . '/../View/viewHome.php');
    }
}
