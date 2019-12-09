<?php

namespace Model\Repository;

use Model\Entity\Database;
use Model\Entity\Secteur;
use PDO;

class SecteurDAO extends Database implements DAO {
    public function getAll() {
        $rq = Database::getInstance()->query('SELECT * FROM Secteur');
        
        return $rq->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getById(int $id) {
        $rq = Database::getInstance()->prepare('SELECT * FROM Secteur WHERE id = :id');
        $rq->exec(['id' => $id]);

        return $rq->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insert(Secteur $secteur) {
        $rq = Database::getInstance()->prepare('INSERT INTO Secteur (ID, LIBELLE) VALUES (null, :libelle)');
        $rq->exec(['libelle' => $secteur->getLibelle()]);
    }
    
    public function update(int $secteur) {
        $rq = Database::getInstance()->prepare('UPDATE Secteur SET LIBELLE = :libelle');
        $rq->exec(['libelle' => $secteur->getLibelle()]);
    }
    
    public function delete(int $id) {
        $rq = Database::getInstance()->prepare('DELETE FROM Secteur WHERE id = :id');
        $rq->exec(['id' => $id]);
    }
    
}