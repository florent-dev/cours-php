<?php


use Model\Entity\Structure;
use mvc\Model\Manager\StructureManager;

require_once('SController.php.php');
require_once(__DIR__ . '/../Model/Manager/StructureManager.php.php');



class StructureController extends SController
{
    public function __construct()
    {
        $this->manager = new StructureManager();
    }

    public function viewStructures() : void
    {
        $title = "Liste des structures";
        $structures = $this->findAll();

        require(__DIR__ . '/../view/viewStructures.php.php');
    }

    public function viewStructure($id) : void
    {
        $title = "Détail de la structure";
        $account = $this->findById($id);

        require(__DIR__ . '/../view/viewStructure.php');
    }

    public function addStructure() : void
    {
        $structure = new Structure(null, $_POST["nom"], $_POST["rue"], $_POST["cp"], $_POST["ville"], $_POST["estasso"],$_POST["nb_donateurs"],$_POST["nb_actionnaires"]);
        $this->insert($structure);
        header("Location: index.php?action=viewAccounts");
    }
}
