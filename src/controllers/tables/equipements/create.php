<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['libelle_equipement'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Creation d'un equipement -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation d'un nouvel equipement </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        exit();
    }
}

$logger->info("Creation d'un equipement -- VERIF SERVEUR OK");
if($error == null) {
    $data = [
        'libelle_equipement' => $_POST['libelle_equipement']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        'libelle_equipement' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $db = Connection::getPDO();
    if($db){
        try{
            $id = md5(uniqid(rand(), true));
            
            $query = 'INSERT INTO `equipements`(`id`, `libelle_equipement`)
            VALUES (:id, :libelle_equipement)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
                ':libelle_equipement' => $data_sanitized['libelle_equipement']
            ));
            $logger->info("Creation d'un equipement -- TABLE EQUIPEMENTS OK");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Equipement ajouté avec succès");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec lors de la creation d'un equipement -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la creation d'un equipement");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }else{
        $logger->alert("Echec lors de la creation d'un equipement -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation d'un equipement");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
