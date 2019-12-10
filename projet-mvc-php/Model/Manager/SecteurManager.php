<?php

namespace mvc\Model\Manager;

require_once(__DIR__ . '/../Entities/Secteur.php');
require_once(__DIR__.'/../entities/Entities.php');
require_once('PDOManager.php');

use mvc\Model\Entities\Secteur;
use mvc\model\entities\Entity;
use \PDOStatement;

class SecteurManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from secteur where id=:id", [ "id" => $id]);
        $secteur = $stmt->fetch();
        if (!$secteur) return null;
        return new Secteur($secteur["ID"],$secteur["LIBELLE"]);
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from secteur",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $secteurs = $stmt->fetchAll($pdoFecthMode);

        $secteursEntities=[];
        foreach($secteurs as $secteur) {
            $secteursEntities[] = new Secteur($secteur["ID"],$secteur["LIBELLE"]);
        }
        return $secteursEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteur(id, libelle, readonly) values (:id, :libelle)";
        $params = array("id" => $e->getId(), "libelle" => $e->getLibelle());
        $res=$this->executePrepare($req,$params);
        return $res;
    }
}