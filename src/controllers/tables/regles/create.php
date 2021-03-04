<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

if($_SESSION['role'] != "administrateur"){
    $logger->alert("Creation d'une regle -- Tentative d'accès sans être administrateur");
    $_SESSION['flash'] = array('Error', "Veuillez vous connecter pour effectuer cette action");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['libelle_regle'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Creation d'une regle -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation d'une nouvelle regle </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        exit();
    }
}

$logger->info("Creation d'une regle -- VERIF SERVEUR OK");
if($error == null) {
    $data = [
        'libelle_regle' => $_POST['libelle_regle']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    $filters = [
        'libelle_regle' => 'trim|escape|capitalize|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $db = Connection::getPDO();
    if($db){
        try{
            $id = md5(uniqid(rand(), true));
            
            $query = 'INSERT INTO `regles`(`id`, `libelle_regle`)
            VALUES (:id, :libelle_regle)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
                ':libelle_regle' => $data_sanitized['libelle_regle']
            ));
            $logger->info("Creation d'une regle -- TABLE REGLES OK");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Regle ajoutée avec succès");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec lors de la creation d'une regle -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la creation d'une regle");
            header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
        }
    }else{
        $logger->alert("Echec lors de la creation d'une regle -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation d'une regle");
        header("Location:" . getenv("URL_APP") . "/src/pages/admin.php");
    }
}
