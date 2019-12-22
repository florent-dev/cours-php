<?php

namespace mvc\Model\Manager;

require_once('PDOManager.php');
require_once(__DIR__ . '/../Entities/Entreprise.php');
require_once(__DIR__ . '/../Entities/Entity.php');

use Model\Entity\Entreprise;
use mvc\Model\Entities\Entity;
use \PDOStatement;

class EntrepriseManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE id=:id', ['id' => $id]);
        $entreprise = $stmt->fetch();

        if (!$entreprise) return null;

        return new Entreprise($entreprise['ID'], $entreprise['NOM'], $entreprise['RUE'], $entreprise['CP'], $entreprise['VILLE'],
            $entreprise['ESTASSO'], $entreprise['NB_ACTIONNAIRES']);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare('SELECT * FROM structure WHERE estAsso=0', []);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $entreprises = $stmt->fetchAll($pdoFecthMode);

        $entrepriseEntities = [];
        foreach ($entreprises as $entreprise) {
            if ($entreprise['ESTASSO'] == 0) {
                $entrepriseEntities[] = new Entreprise($entreprise['ID'], $entreprise['NOM'], $entreprise['RUE'], $entreprise['CP'], $entreprise['VILLE'],
                    $entreprise['ESTASSO'], $entreprise['NB_ACTIONNAIRES']);
            }
        }

        return $entrepriseEntities;
    }

    public function insert(Entity $e): int
    {
        $req = 'INSERT INTO structure(id, nom, rue, cp, ville, estasso, nb_donateurs, nb_actionnaires) VALUES (:id, :nom, :rue, :cp, :ville, :estasso, null, :nb_actionnaires)';
        $params = array('id' => $e->getId(), 'nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(),
            'ville' => $e->getVille(), 'estasso' => $e->getEstasso(), 'nb_actionnaires' => $e->getNbActionnaires());
        $res = $this->executePrepareLastId($req, $params);

        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = 'UPDATE structure SET nom=:nom, rue=:rue, cp=:cp, ville=:ville, nb_actionnaires=:nb_actionnaires WHERE id=:id';
        $params = array('nom' => $e->getNom(), 'rue' => $e->getRue(), 'cp' => $e->getCp(), 'ville' => $e->getVille(), 'nb_actionnaires' => $e->getNbActionnaires(), 'id' => $e->getId());
        $res = $this->executePrepare($req, $params);

        return $res;
    }
}