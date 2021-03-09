<?php
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$db = Connection::getPDO();
if($db){
    try{
        //RECUPERATION DE LA LISTE DES EQUIPEMENTS
        $query = $db->query("SELECT * FROM `equipements` ORDER BY libelle_equipement ASC");
        $equipements = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE EQUIPEMENTS OK");

        //RECUPERATION DE LA LISTE DES REGLES
        $query = $db->query("SELECT * FROM `regles` ORDER BY libelle_regle ASC");
        $regles = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE REGLES OK");

        //RECUPERATION DE LA LISTE DES PHOTOS
        $id = $_SESSION["id_utilisateur"];
        $query = $db->query("SELECT * FROM `photo_utilisateur` 
        INNER JOIN `photos` ON photos.id = photo_utilisateur.id_photo
        WHERE photo_utilisateur.id_utilisateur = '$id'
        ");
        $ma_photo = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE PHOTOS OK");

        //RECUPERATION DE LA LISTE DES VILLES
        $query = $db->query("SELECT * FROM `villes` ORDER BY libelle_ville ASC");
        $villes = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE REGLES OK");

        
        //RECUPERATION DE LA LISTE DES PARTICULIERS
        $query = $db->query("SELECT utilisateurs.id AS id_user, particulier.id AS id_particulier, email, nom, prenom FROM `utilisateurs` INNER JOIN particulier ON particulier.id_utilisateur = utilisateurs.id ORDER BY nom ASC");
        $particuliers = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE PARTICULIER OK");

        //RECUPERATION DE LA LISTE DES PROPRIETAIRES
        $query = $db->query("SELECT utilisateurs.id AS id_user, proprietaire.id AS id_proprietaire, email, nom, prenom FROM `utilisateurs` INNER JOIN proprietaire ON proprietaire.id_utilisateur = utilisateurs.id ORDER BY nom ASC");
        $proprietaires = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE PROPRIETAIRE OK");


        // On complete les valeurs pour session
        // $_SESSION['flash'] = array('Success', "Récupération des données effectuée");
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec de la recuperation des donnees admin -- $error");
        // $_SESSION['flash'] = array('Error', "Echec de la recuperation des donnees admin");
        // header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}else{
    $logger->alert("Echec de la recuperation des donnees admin -- Impossible de se connecter à la base de données");
    // $_SESSION['flash'] = array('Error', "Echec de la recuperation des donnees admin");
    // header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
}
