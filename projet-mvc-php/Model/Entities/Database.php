<?php

namespace Model\Entities;

use PDO;
use PDOException;

class Database extends PDO
{
    private static $_instance = null;

    /**
     * Récupérer l'accès à la BDD
     * @return PDO|null
     */
    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            try {
                self::$_instance = new PDO('mysql:host=' . self::$_server . ';dbname=' . self::$_db, self::$_user, self::$_pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . $e->getTraceAsString();
            }
        }

        return self::$_instance;
    }

}