<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

if($_SESSION['role'] != "administrateur"){
    $logger->alert("modification de la regle -- Tentative d'accès sans être administrateur");
    $_SESSION['flash'] = array('Error', "Veuillez vous connecter pour effectuer cette action");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['id_regle', 'libelle_regle'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("modification de la regle -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la modification de la regle </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        exit();
    }
}

$logger->info("modification de la regle -- VERIF SERVEUR OK");
if($error == null) {
    $data = [
        'id_regle' => $_POST['id_regle'],
        'libelle_regle' => $_POST['libelle_regle']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        'id_regle' => 'trim|escape|capitalize|htmlspecialchars',
        'libelle_regle' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $db = Connection::getPDO();
    if($db){
        try{
            $query = 'UPDATE `regles` SET libelle_regle = :libelle_regle WHERE id = :id';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $data_sanitized['id_regle'],
                ':libelle_regle' => $data_sanitized['libelle_regle']
            ));
            $logger->info("modification de la regle -- TABLE REGLES OK");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Regle modifiée avec succès");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec lors de la modification de la regle -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la modification de la regle");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }else{
        $logger->alert("Echec lors de la modification de la regle -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la modification de la regle");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}
