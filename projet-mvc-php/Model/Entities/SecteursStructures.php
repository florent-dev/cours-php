<?php

namespace Model\Entity;

require_once 'Entity.php';

use mvc\Model\Entities\Entity;

class SecteursStructures extends Entity
{
    // Attributs
    private $_id;
    private $_idStructure;
    private $_idSecteur;

    // Constructeur
    public function __construct($id, $idSecteur, $idStructure)
    {
        $this->_id = $id;
        $this->_idSecteur = $idSecteur;
        $this->_idStructure = $idStructure;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return int
     */
    public function getIdSecteur()
    {
        return $this->_idSecteur;
    }

    /**
     * @param int $idSecteur
     */
    public function setIdSecteur(int $idSecteur): void
    {
        $this->_idSecteur = $idSecteur;
    }

    /**
     * @return int
     */
    public function getIdStructure()
    {
        return $this->_idStructure;
    }

    /**
     * @param int $idStructure
     */
    public function setIdStructure(int $idStructure): void
    {
        $this->_idStructure = $idStructure;
    }
}