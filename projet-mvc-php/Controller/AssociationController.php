<?php

namespace mvc\Controller;

require_once('SController.php');
require_once(__DIR__ . '/../Model/Manager/AssociationManager.php');

use Model\Entity\Association;
use Model\Entity\SecteursStructures;
use mvc\Model\Manager\AssociationManager;
use mvc\Model\Manager\SecteurManager;
use mvc\Model\Manager\SecteursStructuresManager;

class AssociationController extends SController
{
    private $_secteurManager;
    private $_secteursStructuresManager;

    public function __construct()
    {
        $this->manager = new AssociationManager();
        $this->_secteurManager = new SecteurManager();
        $this->_secteursStructuresManager = new SecteursStructuresManager();
    }

    public function viewAssociations(): void
    {
        $associations = $this->findAll();

        require(__DIR__ . '/../View/viewAssociations.php');
    }

    public function viewAssociation($id): void
    {
        $association = $this->findById($id);
        $linkedSecteurs = $this->_secteursStructuresManager->getIdSecteursByIdStructure($association->getId());

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
            $linkedSecteurs = $this->_secteursStructuresManager->getIdSecteursByIdStructure($association->getId());
            $title = 'Modifier l\'association n°' . $association->getId();
            $action .= 'updateAssociation&id=' . $association->getId();
        }

        require(__DIR__ . '/../View/editorAssociation.php');
    }

    public function createAssociation(): void
    {
        $association = new Association(null, $_POST['nom'], $_POST['rue'], $_POST['cp'], $_POST['ville'], 1, $_POST['nb_donateurs']);

        if (isset($_POST['secteurs'])) {
            if (count($_POST['secteurs']) > 0) {

                // On insert l'association puis après ça les secteurs liés
                $idStructureInserted = $this->insert($association);
                foreach ($_POST['secteurs'] as $secteurId) {
                    $secteurStructure = new SecteursStructures(null, $secteurId, $idStructureInserted);
                    $this->_secteursStructuresManager->insert($secteurStructure);
                }

                header('Location: index.php?action=viewAssociations');
                return;
            }
        }

        header('Location: index.php?action=createAssociation');
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

            // Mise à jour des secteurs de la structure
            $this->_secteursStructuresManager->deleteByIdStructure($association->getId());

            foreach ($_POST['secteurs'] as $secteurId) {
                $secteurStructure = new SecteursStructures(null, $secteurId, $association->getId());
                $this->_secteursStructuresManager->insert($secteurStructure);
            }
        }

        header('Location: index.php?action=viewAssociations');
    }
}
