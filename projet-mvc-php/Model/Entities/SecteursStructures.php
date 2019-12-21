<?php

namespace Model\Entity;

require_once 'Entity.php';

use mvc\Model\Entities\Entity;

class SecteursStructures extends Entity
{
    //Attributs
    private $_id;
    private $_idStructure;
    private $_idSecteur;

    //Constructeur
    public function __construct($id,$idSecteur,$idStructure)
    {
        $this->_id=$id;
        $this->_idSecteur=$idSecteur;
        $this->_idStructure=$idStructure;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdSecteur()
    {
        return $this->_idSecteur;
    }

    /**
     * @param mixed $idSecteur
     */
    public function setIdSecteur($idSecteur): void
    {
        $this->_idSecteur = $idSecteur;
    }

    /**
     * @return mixed
     */
    public function getIdStructure()
    {
        return $this->idStructure;
    }

    /**
     * @param mixed $idStructure
     */
    public function setIdStructure($idStructure): void
    {
        $this->_idStructure = $idStructure;
    }
}