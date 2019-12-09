<?php

require 'Model/Entity/Database.php';

use Model\Entity\Database;

$db = Database::getInstance();
$rq = $db->query('SELECT * FROM Secteur');
$res = $rq->fetchAll(PDO::FETCH_ASSOC);

var_dump($res);

?>