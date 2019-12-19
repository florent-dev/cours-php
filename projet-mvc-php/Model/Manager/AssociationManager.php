<?php

namespace mvc\Model\Manager;

require_once('PDOManager.php');
require_once(__DIR__ . '/../Entities/Structure.php');
require_once(__DIR__ . '/../Entities/Entity.php');

use Model\Entities\Structure;
use Model\Entity\Association;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class AssociationManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE id=:id', [ 'id' => $id]);
        $structure = $stmt->fetch();

        if (!$structure) return null;

        return new Association($structure['ID'],$structure['NOM'],$structure['RUE'],$structure['CP'],$structure['VILLE'],
            $structure['ESTASSO'], $structure['NB_DONATEURS']);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE estAsso=1',[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $structures = $stmt->fetchAll($pdoFecthMode);

        $associationEntities = [];
        foreach($structures as $structure) {
            if($structure['ESTASSO']==1) {
                $associationEntities[] = new Structure($structure['ID'], $structure['NOM'], $structure['RUE'], $structure['CP'], $structure['VILLE'],
                    $structure['ESTASSO'], $structure['NB_DONATEURS']);
            }
        }

        return $associationEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = 'INSERT INTO structure(id, nom, rue, cp, ville, estasso, nb_donateurs, null) VALUES (:id, :nom, :rue, :cp, :ville, :estasso, :nb_donateurs)';
        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(),
            'ville' => $e->getVille(), 'estasso' => $e->getEstAssocie(), 'nb_donateurs' => $e->getNbDonateurs());
        $res = $this->executePrepare($req, $params);

        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = 'UPDATE structure SET nom=:nom, rue=:rue, cp=:cp, ville=:ville, nb_donateurs=:nb_donateurs WHERE id=:id';
        $params = array('nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(), 'ville' => $e->getVille(),
            'nb_donateurs' => $e->getNbDonateurs(),'id' => $e->getId());
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