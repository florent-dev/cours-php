<?php

namespace mvc\Model\Manager;

require_once('PDOManager.php');
require_once(__DIR__ . '/../Entities/Structure.php');
require_once(__DIR__ . '/../Entities/Entity.php');

use Model\Entities\Structure;
use Model\Entity\Association;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class EntrepriseManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE id=:id', ['id' => $id]);
        $structure = $stmt->fetch();

        if (!$structure) return null;

        return new Association($structure['ID'], $structure['NOM'], $structure['RUE'], $structure['CP'], $structure['VILLE'],
            $structure['ESTASSO'], $structure['NB_ACTIONNAIRES']);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE estAsso=0', []);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $structures = $stmt->fetchAll($pdoFecthMode);

        $entrepriseEntities = [];
        foreach ($structures as $structure) {
            if ($structure['ESTASSO'] == 0) {
                $entrepriseEntities[] = new Structure($structure['ID'], $structure['NOM'], $structure['RUE'], $structure['CP'], $structure['VILLE'],
                    $structure['ESTASSO'], $structure['NB_ACTIONNAIRES']);
            }
        }

        return $entrepriseEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = 'INSERT INTO structure(id, nom, rue, cp, ville, estasso, null, nb_actionnaires) VALUES (:id, :nom, :rue, :cp, :ville, :estasso, :nb_actionnaires)';
        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(),
            'ville' => $e->getVille(), 'estasso' => $e->getEstAssocie(), 'nb_actionnaires' => $e->getNbActionnaires());
        $res = $this->executePrepare($req, $params);

        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = 'UPDATE structure SET nom=:nom, rue=:rue, cp=:cp, ville=:ville, nb_donateurs=:nb_donateurs, nb_actionnaires=:nb_actionnaires WHERE id=:id';
        $params = array('nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(), 'ville' => $e->getVille(),'nb_actionnaires' => $e->getNbActionnaires(), 'id' => $e->getId());
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
}