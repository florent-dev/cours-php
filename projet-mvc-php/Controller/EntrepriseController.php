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
    public function __construct()
    {
        $this->manager = new EntrepriseManager();
    }

    public function viewEntreprises(): void
    {
        $structures = $this->findAll();

        require(__DIR__ . '/../View/viewStructures.php');
    }

    public function viewEntreprise($id): void
    {
        $structure = $this->findById($id);

        require(__DIR__ . '/../View/viewStructure.php');
    }

    public function editorEntreprise($id): void
    {
        var_dump($id);
        exit;
        $structure = (null !== $id) ? $this->findById($id) : null;
        $action = 'index.php?action=';

        if (null === $structure) {
            $title = 'Créer l\'entreprise';
            $action .= 'createEntreprise';
        } else {
            $title = 'Modifier l\'entreprise n°' . $structure->getId();
            $action .= 'updateEntreprise&id=' . $structure->getId();
        }

        require(__DIR__ . '/../View/editorStructure.php');
    }

    public function createEntreprise(): void
    {
        $entreprise = new Entreprise(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['estasso'], $_POST['nb_actionnaires']);
        $this->insert($entreprise);
        header('Location: index.php?action=viewEntreprises');
    }

    public function updateEntreprise($id): void
    {
        $entreprise = $this->findById($id);

        if (null !== $entreprise) {
            $entreprise->setLibelle($_POST['libelle']);
            $this->update($entreprise);
        }

        header('Location: index.php?action=viewEntreprises');
    }

    public function deleteEntreprise($id): void
    {
        $entreprise = $this->findById($id);

        if (null !== $entreprise) {
            $this->delete($entreprise);
        }

        header('Location: index.php?action=viewEntreprises');
    }
}
