<?php

namespace mvc\Controller;

require_once(__DIR__ . '/../Model/Manager/PDOManager.php');

use mvc\Model\Entities\Entity;
use mvc\Model\Manager\PDOManager;
use \PDOStatement;
use \PDO;

abstract class SController
{
    protected $manager;

    /**
     * @return PDOManager
     */
    public function getManager(): PDOManager
    {
        return $this->manager;
    }

    /**
     * @param PDOManager $manager
     */
    public function setManager(PDOManager $manager): void
    {
        $this->manager = $manager;
    }

    /**
     * @param int $id
     * @return Entity
     */
    public function findById(int $id): ?Entity
    {
        return ($this->getManager()->findById($id));
    }

    /**
     * @return PDOStatement
     */
    public function find(): PDOStatement
    {
        return ($this->getManager()->find());
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return ($this->getManager()->findAll(PDO::FETCH_ASSOC));
    }

    /**
     * @param Entity $e
     */
    public function insert(Entity $e)
    {
        return ($this->getManager()->insert($e));
    }

    /**
     * @param Entity $e
     */
    public function update(Entity $e): void
    {
        $this->getManager()->update($e);
    }

    /**
     * @param Entity $e
     */
    public function delete(Entity $e): void
    {
        $this->getManager()->delete($e);
    }
}