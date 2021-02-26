<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$error = null;

if(isset($_POST['id']) && isset($_POST['id_particulier'])){
    $db = Connection::getPDO();
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
    $id_particulier = htmlspecialchars($_POST['id_particulier'], ENT_QUOTES);
    if($db){
        //Lancement des requetes
        try{
            $db->beginTransaction();
            
            //SUPPRESSION TABLE PHOTO
            $query = 'DELETE FROM `photo_utilisateur` WHERE id_utilisateur = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
            ));
            $logger->info("Suppression d'un utilisateur -- TABLE PHOTO SUCCESS");
            //SUPPRESSION TABLE VILLE
            $query = 'DELETE FROM `ville_particulier` WHERE particulier_id = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id_particulier,
            ));
            $logger->info("Suppression d'un utilisateur -- TABLE VILLE SUCCESS");
            //SUPPRESSION TABLE INTERETS
            $query = 'DELETE FROM `interet_particulier` WHERE id_particulier = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id_particulier,
            ));
            $logger->info("Suppression d'un utilisateur -- TABLE INTERETS SUCCESS");
            //SUPPRESSION TABLE PARTICULIER
            $query = 'DELETE FROM `particulier` WHERE id = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id_particulier,
            ));
            $logger->info("Suppression d'un utilisateur -- TABLE PARTICULIER SUCCESS");
            //SUPPRESSION TABLE UTILISATEUR
            $query = 'DELETE FROM `utilisateurs` WHERE id = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
            ));
            $logger->info("Suppression d'un utilisateur -- TABLE UTILISATEUR SUCCESS");
           
            $db->commit();
            
            $logger->info("Suppression d'un utilisateur -- Role colocataire");
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Compte supprimé avec succès");
            unset($_SESSION['isLoggedIn']);
            unset($_SESSION['role']);
            unset($_SESSION['id_utilisateur']);
            header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $logger->error("Echec lors de la suppression de compte (colocataire) -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
            header("Location:" . getenv("URL_APP") . "/src/pages/signupParticulier.php");
        }
    }else{
        $logger->alert("Echec lors de la suppression de compte -- Impossible de se connecter à la bdd");
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
        header("Location:" . getenv("URL_APP") . "/src/pages/compteParticulier.php");
    }
}else{
    $logger->alert("Echec lors de la suppression de compte -- Paramètres incorrects");
    $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
    header("Location:" . getenv("URL_APP") . "/src/pages/compteParticulier.php");
}