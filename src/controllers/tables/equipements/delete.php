<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

if($_SESSION['role'] != "administrateur"){
    $logger->alert("suppression d'un equipement -- Tentative d'accès sans être administrateur");
    $_SESSION['flash'] = array('Error', "Veuillez vous connecter pour effectuer cette action");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['id_equipement'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Suppression d'un equipement -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression d'un nouvel equipement </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        exit();
    }
}

$logger->info("suppression d'un equipement -- VERIF SERVEUR OK");
if($error == null) {
    $data = [
        'id_equipement' => $_POST['id_equipement']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        'id_equipement' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $db = Connection::getPDO();
    if($db){
        try{
            $query = 'DELETE FROM `equipements` WHERE id = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $data_sanitized['id_equipement']
            ));
            $logger->info("Suppression d'un equipement -- TABLE EQUIPEMENTS OK");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Equipement supprimé avec succès");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec lors de la suppression de l'equipement -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la suppression de l'equipement");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }else{
        $logger->alert("Echec lors de la suppression de l'equipement -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la suppression de l'equipement");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}
