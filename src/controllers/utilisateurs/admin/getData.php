<?php
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$db = Connection::getPDO();
if($db){
    try{
        //RECUPERATION DE LA LISTE DES EQUIPEMENTS
        $query = $db->query("SELECT * FROM `equipements`");
        $equipements = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE EQUIPEMENTS OK");

        //RECUPERATION DE LA LISTE DES REGLES
        $query = $db->query("SELECT * FROM `regles`");
        $regles = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE REGLES OK");

        //RECUPERATION DE LA LISTE DES PHOTOS
        $id = $_SESSION["id_utilisateur"];
        $query = $db->query("SELECT * FROM `photo_utilisateur` 
        INNER JOIN `photos` ON photos.id = photo_utilisateur.id_photo
        WHERE photo_utilisateur.id_utilisateur = '$id'
        ");
        $regles = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE PHOTOS OK");

        //RECUPERATION DE LA LISTE DES VILLES
        $query = $db->query("SELECT * FROM `villes`");
        $villes = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des donnees admin -- TABLE REGLES OK");
        $logger->info("Recuperation des donnees admin -- Role proprietaire");
        // On complete les valeurs pour session
        $_SESSION['flash'] = array('Success', "Récupération des données effectuée");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec de la recuperation des donnees admin -- $error");
        $_SESSION['flash'] = array('Error', "Echec de la recuperation des donnees admin");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}else{
    $logger->alert("Echec de la recuperation des donnees admin -- Impossible de se connecter à la base de données");
    $_SESSION['flash'] = array('Error', "Echec de la recuperation des donnees admin");
    header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
}
