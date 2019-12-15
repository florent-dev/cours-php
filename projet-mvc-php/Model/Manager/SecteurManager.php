<?php

namespace mvc\Model\Manager;

require_once(__DIR__ . '/../Entities/Secteur.php');
require_once('PDOManager.php');

use Model\Entity\Secteur;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class SecteurManager extends PDOManager
{
    public function findById(int $id): Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM secteur WHERE id=:id', ['id' => $id]);
        $secteur = $stmt->fetch();

        if (!$secteur) return null;

        return new Secteur($secteur['ID'], $secteur['LIBELLE']);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM secteur', []);

        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $secteurs = $stmt->fetchAll($pdoFecthMode);

        $secteursEntities = [];
        foreach($secteurs as $secteur) {
            $secteursEntities[] = new Secteur($secteur['ID'],$secteur['LIBELLE']);
        }

        return $secteursEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = 'INSERT INTO secteur(id, libelle) VALUES (:id, :libelle)';
        $params = ['id' => $e->getId(), 'libelle' => $e->getLibelle()];
        $res = $this->executePrepare($req, $params);

        return $res;
    }
}