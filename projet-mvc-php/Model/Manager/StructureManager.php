<?php

namespace mvc\Model\Manager;

require_once('PDOManager.php');
require_once(__DIR__ . '/../Entities/Structure.php');
require_once(__DIR__ . '/../Entities/Entity.php');


use Model\Entity\Association;
use Model\Entity\Entreprise;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class StructureManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE id=:id', ['id' => $id]);
        $datas = $stmt->fetch();

        if (!$datas) return null;

        return $this->buildStructure($datas);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM structure',[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $datasStructures = $stmt->fetchAll($pdoFecthMode);

        $structuresEntities = [];
        foreach($datasStructures as $datasStructure) {
            $structuresEntities[] = $this->buildStructure($datasStructure);
        }

        return $structuresEntities;
    }

    public function insert(Entity $e)
    {
        if ($e->getEstasso() == '1') {
            $nbDonateurs = $e->getNbDonateurs();
            $nbActionnaires = null;
        } else {
            $nbDonateurs = null;
            $nbActionnaires = $e->getNbActionnaires();
        }

        $req = 'INSERT INTO structure(id, nom, rue, cp, ville, estasso, nb_donateurs, nb_actionnaires) VALUES (:id, :nom, :rue, :cp, :ville, :estasso, :nb_donateurs, :nb_actionnaires)';
        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(),
            'ville' => $e->getVille(), 'estasso' => $e->getEstasso(), 'nb_donateurs' => $nbDonateurs, 'nb_actionnaires' => $nbActionnaires);
        $res = $this->executePrepareLastId($req, $params);
        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        if ($e->getEstasso() == 1) {
            $nbDonateurs = $e->getNbDonateurs();
            $nbActionnaires = null;
        } else {
            $nbDonateurs = null;
            $nbActionnaires = $e->getNbActionnaires();
        }

        $req = 'UPDATE structure SET nom=:nom, rue=:rue, cp=:cp, ville=:ville, estasso=:estasso, nb_donateurs=:nb_donateurs, nb_actionnaires=:nb_actionnaires WHERE id=:id';
        $params = array('nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(), 'ville' => $e->getVille(), 'estasso' => $e->getEstasso(),
            'nb_donateurs' => $e->getNbDonateurs(), 'nb_actionnaires' => $e->getNbActionnaires(), 'id' => $e->getId());
        $res = $this->executePrepare($req, $params);

        return $res;
    }

    public function delete(Entity $e): PDOStatement
    {
        $req = 'DELETE FROM structure WHERE id=:id';
        $params = array('id' => $e->getId());
        $res = $this->executePrepare($req, $params);

        return $res;
    }

    private function buildStructure($structure) {
        return ($structure['ESTASSO'] == 1)
            ? new Association($structure['ID'], $structure['NOM'], $structure['RUE'], $structure['CP'], $structure['VILLE'], $structure['ESTASSO'], $structure['NB_DONATEURS'])
            : new Entreprise($structure['ID'], $structure['NOM'], $structure['RUE'], $structure['CP'], $structure['VILLE'], $structure['ESTASSO'], $structure['NB_ACTIONNAIRES'])
        ;
    }
}
