<?php

require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{
        //photo utilisateur ok
        $query = $db->query("SELECT * 
        FROM photo_utilisateur 
        INNER JOIN photos ON photos.id = photo_utilisateur.id_photo
        WHERE photo_utilisateur.id_utilisateur = '$idUtilisateur'");
        $utilisateurs = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des regles -- SUCCESS");

        //photo annonce ok
        $query = $db->query("SELECT libelle_photo 
        FROM photo_chambre
        INNER JOIN photos ON photos.id = photo_chambre.id_photo
        INNER JOIN chambres ON chambres.id_chambre = photo_chambre.id_chambre
        WHERE photo_chambre.id_chambre = '$idChambre'");
        $images = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des regles -- SUCCESS");

        
        $logger->info("Recuperation des données -- FIN DES REQ");
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
    }
}else{
    $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
}
