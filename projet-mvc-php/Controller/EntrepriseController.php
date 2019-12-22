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
    private $_secteurManager;

    public function __construct()
    {
        $this->manager = new EntrepriseManager();
        $this->_secteurManager = new SecteurManager();
    }

    public function viewEntreprises(): void
    {
        $entreprises = $this->findAll();

        require(__DIR__ . '/../View/viewEntreprises.php');
    }

    public function viewEntreprise($id): void
    {
        $entreprise = $this->findById($id);

        require(__DIR__ . '/../View/viewEntreprise.php');
    }

    public function editorEntreprise($id): void
    {
        $secteurs = $this->_secteurManager->findAll(\PDO::FETCH_ASSOC);
        $entreprise = (null !== $id) ? $this->findById($id) : null;
        $action = 'index.php?action=';

        if (null === $entreprise) {
            $title = 'Créer l\'entreprise';
            $action .= 'createEntreprise';
        } else {
            $title = 'Modifier l\'entreprise n°' . $entreprise->getId();
            $action .= 'updateEntreprise&id=' . $entreprise->getId();
        }

        require(__DIR__ . '/../View/editorEntreprise.php');
    }

    public function createEntreprise(): void
    {
        $entreprise = new Entreprise(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], 0, $_POST['nb_actionnaires']);
        $this->insert($entreprise);
        header('Location: index.php?action=viewEntreprises');
    }

    public function updateEntreprise($id): void
    {
        $entreprise = $this->findById($id);

        if (null !== $entreprise) {
            $entreprise->setNom($_POST['nom']);
            $entreprise->setRue($_POST['rue']);
            $entreprise->setCp($_POST['cp']);
            $entreprise->setVille($_POST['ville']);
            $entreprise->setNbActionnaires($_POST['nb_actionnaires']);
            $this->update($entreprise);
        }

        header('Location: index.php?action=viewEntreprises');
    }
}
