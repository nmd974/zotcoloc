<?php

require_once(dirname(dirname(__DIR__)).'/class/Connection.php');
$db = Connection::getPDOheroku();

if($db){
    try{
        $query = $db->query('CREATE TABLE `equipements` (
            `id` varchar(32) NOT NULL,
            `libelle_equipement` varchar(50) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
          $db->exec();
            var_dump("Ajout ok");
    }catch(PDOException $e){
        $error = $e->getMessage();
        var_dump($error);
    }
}