<?php

namespace mvc\Model\Manager;

require_once('PDOManager.php');

use Model\Entity\SecteursStructures;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class SecteursStructuresManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM secteurs_structures WHERE id=:id', ['id' => $id]);
        $datas = $stmt->fetch();

        if (!$datas) return null;

        return $this->buildStructure($datas);
    }

    public function findByIdSecteur(int $idSecteur): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM secteurs_structures WHERE id_secteur=:idSecteur', ['idSecteur' => $idSecteur]);
        $datas = $stmt->fetch();

        if (!$datas) return null;

        return $this->buildStructure($datas);
    }

    public function findByIdStructure(int $idStructure): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM secteurs_structures WHERE id_structure=:idStructure', ['idStructure' => $idStructure]);
        $datas = $stmt->fetch();

        if (!$datas) return null;

        return $this->buildStructure($datas);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM secteurs_structures', []);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $secteursStructures = $stmt->fetchAll($pdoFecthMode);
        $secteursStructuresEntities = [];
        foreach ($secteursStructures as $secteursStructure) {
            $secteursStructuresEntities[] = new SecteursStructures($secteursStructure['ID'], $secteursStructure['ID_SECTEUR'], $secteursStructure['ID_STRUCTURE']);
        }
        return $secteursStructuresEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = 'INSERT INTO secteur_structure(id, id_secteur,id_structure) VALUES (:id, :id_secteur,:id_structure)';
        $params = ['id' => $e->getId(), 'id_secteur' => $e->getIdSecteur(),'id_strcuture'=>$e->getIdStructure()];
        $res = $this->executePrepare($req, $params);

        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        // TODO: Implement update() method.
    }

    public function delete(Entity $e): PDOStatement
    {
        $req = 'DELETE FROM secteur_structure WHERE id=:id';
        $params = array('id' => $e->getId());
        $res = $this->executePrepare($req, $params);

        return $res;
    }
}