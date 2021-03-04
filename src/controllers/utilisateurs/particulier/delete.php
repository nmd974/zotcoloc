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
            //RECUPERATION DE LA LISTE DES LOGEMENTS CREES
            $query = 'SELECT * FROM `logements` WHERE id_utilisateur = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
            ));
            $liste_logements = $sth->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Suppression d'un proprietaire -- RECUP LISTE LOGEMENTS");
            
            if(count($liste_logements) > 0){
                foreach($liste_logements as $logement){
                    //RECUPERATION DES PHOTOS DU LOGEMENT
                    $query = 'SELECT * FROM photo_logement INNER JOIN `photos` ON photos.id = photo_logement.id_photo WHERE id_logement = :id';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id' => $logement->id_logement,
                    ));
                    $photo_logement = $sth->fetchAll(PDO::FETCH_OBJ);
                    $logger->info("Suppression d'un proprietaire -- RECUP PHOTO DU LOGEMENT");
                    
                    if(count($photo_logement) > 0){
                        foreach($photo_logement as $photo){
                            //On supprime du dossier l'image
                            $oldFilename = __ROOT__."/src/images/" . $photo->libelle_photo;
                            unlink($oldFilename);
                            //SUPPRESSION TABLE PHOTO LOGEMENT
                            $query = 'DELETE FROM `photo_logement` WHERE id_logement = :id';
                            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                            $sth->execute(array(
                                ':id' => $logement->id_logement
                            ));
                            $logger->info("Suppression d'un proprietaire -- TABLE PHOTO LOGEMENT");
                            
                            //SUPPRESSION TABLE PHOTO
                            $query = 'DELETE FROM `photos` WHERE id = :id';
                            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                            $sth->execute(array(
                                ':id' => $photo->id_photo
                            ));
                            $logger->info("Suppression d'un proprietaire -- TABLE PHOTO");
                        }
                    }
                    //RECUPERATION DES CHAMBRES
                    $query = 'SELECT * FROM chambres  WHERE id_logement = :id';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id' => $logement->id_logement,
                    ));
                    $chambres = $sth->fetchAll(PDO::FETCH_OBJ);
                    $logger->info("Suppression d'un proprietaire -- RECUP PHOTO DU LOGEMENT");
                    
                    if(count($chambres) > 0){
                        foreach($chambres as $chambre){
                            //RECUPERATION DES PHOTOS DE LA CHAMBRE
                            $query = 'SELECT * FROM photo_chambre INNER JOIN `photos` ON photos.id = photo_chambre.id_photo WHERE id_chambre = :id';
                            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                            $sth->execute(array(
                                ':id' => $chambre->id_chambre,
                            ));
                            $photo_chambre = $sth->fetchAll(PDO::FETCH_OBJ);
                            $logger->info("Suppression d'un proprietaire -- RECUP PHOTO DE LA CHAMBRE");
                            
                            if(count($photo_chambre) > 0){
                                foreach($photo_chambre as $photo){
                                    //On supprime du dossier l'image
                                    $oldFilename = __ROOT__."/src/images/" . $photo->libelle_photo;
                                    unlink($oldFilename);
                                    //SUPPRESSION TABLE PHOTO LOGEMENT
                                    $query = 'DELETE FROM `photo_chambre` WHERE id_chambre = :id';
                                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                                    $sth->execute(array(
                                        ':id' => $chambre->id_chambre
                                    ));
                                    $logger->info("Suppression d'un proprietaire -- TABLE PHOTO CHAMBRE");
                                    
                                    //SUPPRESSION TABLE PHOTO
                                    $query = 'DELETE FROM `photos` WHERE id = :id';
                                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                                    $sth->execute(array(
                                        ':id' => $photo->id_photo
                                    ));
                                    $logger->info("Suppression d'un proprietaire -- TABLE PHOTO");
                                }
                            }
                            
                            //SUPPRESSION DES EQUIPEMENTS
                            $query = 'DELETE FROM `equipement_chambre` WHERE id_chambre = :id';
                            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                            $sth->execute(array(
                                ':id' => $chambre->id_chambre
                            ));
                            $logger->info("Suppression d'un proprietaire -- TABLE EQUIPEMENT CHAMBRE");
                            
                            //SUPPRESSION DE LA CHAMBRE
                            $query = 'DELETE FROM `chambres` WHERE id_chambre = :id';
                            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                            $sth->execute(array(
                                ':id' => $chambre->id_chambre
                            ));
                            $logger->info("Suppression d'un proprietaire -- TABLE CHAMBRE");
                        }
                    }
                    //SUPPRESSION DES REGLES LOGEMENTS
                    $query = 'DELETE FROM `regle_logement` WHERE id_logement = :id';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id' => $logement->id_logement
                    ));
                    $logger->info("Suppression d'un proprietaire -- TABLE REGLES LOGEMENT");
                    
                    //SUPPRESSION DES EQUIPEMENTS LOGEMENTS
                    $query = 'DELETE FROM `equipement_logement` WHERE id_logement = :id';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id' => $logement->id_logement
                    ));
                    $logger->info("Suppression d'un proprietaire -- TABLE EQUIPEMENT LOGEMENT");
                    
                    //SUPPRESSION DU LOGEMENT
                    $query = 'DELETE FROM `logements` WHERE id_logement = :id';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id' => $logement->id_logement
                    ));
                    $logger->info("Suppression d'un proprietaire -- TABLE LOGEMENT");
                }
            }
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
            if($_SESSION['role'] != "administrateur"){
                $_SESSION['flash'] = array('Success', "Compte supprimé avec succès");
                unset($_SESSION['isLoggedIn']);
                unset($_SESSION['role']);
                unset($_SESSION['id_utilisateur']);
                header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
            }else{
                $_SESSION['flash'] = array('Success', "Compte supprimé avec succès");
                header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
            }
            
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $logger->error("Echec lors de la suppression de compte (colocataire) -- $error");
            if($_SESSION['role'] != "administrateur"){
                $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
                header("Location:" . getenv("URL_APP") . "/src/pages/signupParticulier.php");
            }else{
                $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
                header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
            }
        }
    }else{
        $logger->alert("Echec lors de la suppression de compte -- Impossible de se connecter à la bdd");
        if($_SESSION['role'] != "administrateur"){
            $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
            header("Location:" . getenv("URL_APP") . "/src/pages/compteParticulier.php");
        }else{
            $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }
}else{
    $logger->alert("Echec lors de la suppression de compte -- Paramètres incorrects");
    if($_SESSION['role'] != "administrateur"){
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
        header("Location:" . getenv("URL_APP") . "/src/pages/compteParticulier.php");
    }else{
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression de compte");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}