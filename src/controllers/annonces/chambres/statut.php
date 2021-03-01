<?php
require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');

// MIDDLEWARE
//TODO : check si c la derniere chambre du logement alors on supprime le logement aussi
if(!$_SESSION['isLoggedIn']){
    header('Location: home.php');
    exit();
}

require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
// TODO : Modifier la localisation du dossier imageControl dans le dossier libs
require_once(__ROOT__.'/src/controllers/imageControl.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
if($_GET['id']){
    $id_chambre = htmlspecialchars($_GET['id'], ENT_QUOTES);
    $action = htmlspecialchars($_GET['action'], ENT_QUOTES);
    $role = ucfirst($_SESSION['role']);
    if($action == 0 || $action == 1 || $action == 2) {
        //Connexion à la BDD
        $db = Connection::getPDO();
        if($db){
            try{
                $db->beginTransaction();
                
                //MODIFICATON TABLE LOGEMENTS
                if($action == 1){
                    $query = "UPDATE `chambres` SET `statut_chambre` = 'Active'
                    WHERE `id_chambre` = :id";
                    $_SESSION['flash'] = array('Success', "Chambre activée avec succès");
                }
                if($action == 0){
                    $query = "UPDATE `chambres` SET `statut_chambre` = 'Inactive'
                    WHERE `id_chambre` = :id";
                    $_SESSION['flash'] = array('Success', "Chambre desactivée avec succès");
                }
                if($action == 2){
                    $query = "UPDATE `chambres` SET `statut_chambre` = 'Supprimee'
                    WHERE `id_chambre` = :id";
                    $_SESSION['flash'] = array('Success', "Chambre supprimée avec succès");
                }
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id' => $id_chambre                    
                ));
                $logger->info("Modification du statut du logement -- TABLE LOGEMENT OK");
                $db->commit();
                $logger->info("Modification d'un logement -- FIN DES REQ");
                
                // On complete les valeurs pour session
                header("Location:" . getenv("URL_APP") . "/src/pages/compte$role.php");
            }catch(PDOException $e){
                $error = $e->getMessage();
                $db->rollBack();
                $logger->error("Echec du statut du logement -- $error");
                $_SESSION['flash'] = array('Error', "Echec du statut du logement", "Erreur serveur");
                header("Location:" . getenv("URL_APP") . "/src/pages/compte$role.php");
            }
        }else{
            $logger->alert("Echec lors de la modification de l\'annonce -- Impossible de se connecter à la base de données");
            $_SESSION['flash'] = array('Error', "Echec du statut du logement", "Erreur serveur");
            header("Location:" . getenv("URL_APP") . "/src/pages/compte$role.php");
        }
    }else{
        $logger->alert("Echec lors de la modification de l\'annonce -- Paramètres incorrects");
        $_SESSION['flash'] = array('Error', "Echec du statut du logement", "Paramètres incorrects");
        header("Location:" . getenv("URL_APP") . "/src/pages/compte$role.php");
    }
}
