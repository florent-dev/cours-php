<?php

namespace mvc\Model\Manager;

require_once('PDOManager.php');
require_once(__DIR__ . '/../Entities/Association.php');
require_once(__DIR__ . '/../Entities/Entity.php');

use Model\Entity\Association;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class AssociationManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE id=:id', [ 'id' => $id]);
        $association = $stmt->fetch();

        if (!$association) return null;

        return new Association($association['ID'],$association['NOM'],$association['RUE'],$association['CP'],$association['VILLE'],
            $association['ESTASSO'], $association['NB_DONATEURS']);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE estAsso=1',[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $associations = $stmt->fetchAll($pdoFecthMode);

        $associationEntities = [];
        foreach($associations as $association) {
            if($association['ESTASSO']==1) {
                $associationEntities[] = new Association($association['ID'], $association['NOM'], $association['RUE'], $association['CP'], $association['VILLE'],
                    $association['ESTASSO'], $association['NB_DONATEURS']);
            }
        }

        return $associationEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = 'INSERT INTO structure(id, nom, rue, cp, ville, estasso, nb_donateurs, nb_actionnaires) VALUES (:id, :nom, :rue, :cp, :ville, :estasso, :nb_donateurs, null)';
        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(),
            'ville' => $e->getVille(), 'estasso' => $e->getEstasso(), 'nb_donateurs' => $e->getNbDonateurs());
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
}