<?php

require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{
        //annonce details
        $query = $db->query("SELECT * 
        FROM `chambres` 
        INNER JOIN `logements` ON logements.id_logement = chambres.id_logement
        INNER JOIN `villes` ON logements.id_ville = villes.id 
        INNER JOIN `communes` ON villes.id_commune = communes.id

        INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
        INNER JOIN `roles` ON utilisateurs.id_role = roles.role_id
        INNER JOIN `proprietaire` ON utilisateurs.id=proprietaire.id_utilisateur
        WHERE chambres.id_chambre = '$id'
        ");
        $regles = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des regles -- SUCCESS");

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
