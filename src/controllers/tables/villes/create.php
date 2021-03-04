<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

if($_SESSION['role'] != "administrateur"){
    $logger->alert("Creation d'une ville -- Tentative d'accès sans être administrateur");
    $_SESSION['flash'] = array('Error', "Veuillez vous connecter pour effectuer cette action");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['libelle_ville'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Creation d'une ville -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation d'une nouvelle ville </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        exit();
    }
}

$logger->info("Creation d'une ville -- VERIF SERVEUR OK");
if($error == null) {
    $data = [
        'libelle_ville' => $_POST['libelle_ville']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        'libelle_ville' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $db = Connection::getPDO();
    if($db){
        try{
            $id = md5(uniqid(rand(), true));
            
            $query = 'INSERT INTO `villes`(`id`, `libelle_ville`)
            VALUES (:id, :libelle_ville)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
                ':libelle_ville' => $data_sanitized['libelle_ville']
            ));
            $logger->info("Creation d'une ville -- TABLE VILLE OK");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Regle ajoutée avec succès");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec lors de la creation d'une ville -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la creation d'une ville");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }else{
        $logger->alert("Echec lors de la creation d'une ville -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation d'une ville");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}
