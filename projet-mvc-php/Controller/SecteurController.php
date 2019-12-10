<?php

namespace mvc\Controller;

use Model\Entity\Secteur;
use Model\Entity\Structure;
use mvc\model\manager\StructureManager;

require_once('SController.php.php');
require_once(__DIR__ . '/../Model/Manager/StructureManager.php.php');



class SecteurController extends SController
{
    public function __construct()
    {
        $this->manager = new StructureManager();
    }

    public function viewSecteurs() : void
    {
        $title = "Liste des secteurs";
        $structures = $this->findAll();

        require(__DIR__ . '/../view/viewSecteurs.php.php');
    }

    public function viewStructure($id) : void
    {
        $title = "Détail du secteur";
        $account = $this->findById($id);

        require(__DIR__ . '/../view/viewSecteur.php');
    }

    public function addSecteur() : void
    {
        $structure = new Secteur(null, $_POST["libelle"]);
        $this->insert($structure);
        header("Location: index.php?action=viewSecteurs");
    }
}
