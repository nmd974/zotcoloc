<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

if($_SESSION['role'] != "administrateur"){
    $logger->alert("modification de la ville -- Tentative d'accès sans être administrateur");
    $_SESSION['flash'] = array('Error', "Veuillez vous connecter pour effectuer cette action");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['id_ville', 'libelle_ville'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("modification de la ville -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la modification de la ville </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        exit();
    }
}

$logger->info("modification de la ville -- VERIF SERVEUR OK");
if($error == null) {
    $data = [
        'id_ville' => $_POST['id_ville'],
        'libelle_ville' => $_POST['libelle_ville']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        'id_ville' => 'trim|escape|capitalize|htmlspecialchars',
        'libelle_ville' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $db = Connection::getPDO();
    if($db){
        try{
            $query = 'UPDATE `villes` SET libelle_ville = :libelle_ville WHERE id = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $data_sanitized['id_ville'],
                ':libelle_ville' => $data_sanitized['libelle_ville']
            ));
            $logger->info("modification de la ville -- TABLE VILLES OK");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Ville modifiée avec succès");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec lors de la modification de la ville -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la modification de la ville");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }else{
        $logger->alert("Echec lors de la modification de la ville -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la modification de la ville");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}
