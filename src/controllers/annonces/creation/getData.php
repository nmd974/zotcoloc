<?php

require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{
        $query = $db->query("SELECT * FROM `equipements` ORDER BY `equipements`.`libelle_equipement` ASC");
        $equipements = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des equipements -- SUCCESS");

        $query = $db->query("SELECT * FROM `villes` ORDER BY `villes`.`libelle_ville` ASC");
        $villes = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des villes -- SUCCESS");

        $query = $db->query("SELECT * FROM `regles` ORDER BY `regles`.`libelle_regle` ASC");
        $regles = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des regles -- SUCCESS");
        
        $logger->info("Recuperation des données -- FIN DES REQ");
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
    }
}else{
    $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
}