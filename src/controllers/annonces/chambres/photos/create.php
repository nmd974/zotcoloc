<?php

require_once(dirname(dirname(dirname(dirname(__DIR__)))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
require_once(__ROOT__ . '/src/controllers/imageControl.php');
use \Waavi\Sanitizer\Sanitizer;

//Verification de l'identité de celui qui modifie la photo
if($_SESSION['id_utilisateur'] != htmlspecialchars($_POST['id_utilisateur'])){
    $logger->alert("Ajout d'une photo chambre -- Tentative d'accès sans être proprietaire du logement");
    $_SESSION['flash'] = array('Error', "Echec de la modification");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$id_chambre = htmlspecialchars($_POST['id_chambre']);
//Verification du nombre de photos
if(count($_FILES['photos_logement']['name']) <= 6){
    $logger->info("Ajout d'une nouvelle photo chambre -- VERIF INPUT NOK");
    $_SESSION['flash'] = array('Error', "Echec lors de l'ajout des photos </br> Nombre maximum de photos atteint");
    header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
    exit();
}

$logger->info("Ajout d'une nouvelle photo chambre -- VERIF SERVEUR OK");

$db = Connection::getPDO();
if($db){
    try{
        $indice_nb_photo = count($_FILES['photos_logement']['name']);

        for ($i=0; $i < $indice_nb_photo; $i++) { 
            $ajoutImage = controleImageArray($_FILES['photos_logement'], $i);
            if($ajoutImage[0]){ //La fonction retourne true si erreur
                $logger->alert("Ajout photo chambre -- Erreur lors de l'ajout de l'image chambre");
            }else{
                $id_photo = md5(uniqid(rand(), true));
                //AJOUT TABLE PHOTOS GENERALE
                $query = 'INSERT INTO `photos`(`id`, `libelle_photo`)
                VALUES (:id, :libelle_photo)';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id' => $id_photo,
                    ':libelle_photo' => $ajoutImage[1]
                ));
                $logger->info("Ajout photo chambre -- TABLE PHOTOS OK");
                //AJOUT TABLE PHOTO CHAMBRE
                $query = 'INSERT INTO `photo_chambre`(`id_chambre`, `id_photo`)
                VALUES (:id_chambre, :id_photo)';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_chambre' => $id_chambre,
                    ':id_photo' => $id_photo
                ));
                $logger->info("Ajout photo chambre -- TABLE PHOTO CHAMBRE OK");
            }
        }
        $_SESSION['flash'] = array('Success', "Photo(s) ajoutée(s) avec succès");
        header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec lors de l'ajout des photos -- $error");
        $_SESSION['flash'] = array('Error', "Echec lors de l'ajout des photos");
        header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
    }
}else{
    $logger->alert("Echec lors de l'ajout des photos -- Impossible de se connecter à la base de données");
    $_SESSION['flash'] = array('Error', "Echec lors de l'ajout des photos");
    header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
}
