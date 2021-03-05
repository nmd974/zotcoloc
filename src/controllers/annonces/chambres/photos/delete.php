<?php

require_once(dirname(dirname(dirname(dirname(__DIR__)))).'/libs/session/session.php');
require_once(__ROOT__.'/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;


//Verification de l'identité de celui qui modifie la photo
if($_SESSION['id_utilisateur'] != htmlspecialchars($_POST['user'])){
    $logger->alert("Suppression d'une photo chambre -- Tentative d'accès sans être proprietaire du chambre");
    $_SESSION['flash'] = array('Error', "Echec de la suppression");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    exit();
}

$logger->info("suppression d'une photo chambre -- VERIF SERVEUR OK");

$data = [
    'id_photo' => $_POST['id_photo']
];

$customFilter = [
    'htmlspecialchars' => function($value, $options = []){
        return htmlspecialchars($value, ENT_QUOTES);
    }
];
$filters = [
    'id_photo' => 'trim|escape|capitalize|htmlspecialchars'
];

$sanitizer = new Sanitizer($data, $filters,  $customFilter);
$data_sanitized = $sanitizer->sanitize();

$db = Connection::getPDO();
if($db){
    try{
        $id = $data_sanitized['id_photo'];
        $query = $db->query("SELECT * FROM `photos` WHERE id = '$id'");
        $libelle_photo = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Suppression d'une photo -- TABLE PHOTOS LOGEMENT OK");

        $oldFilename = __ROOT__."/src/images/" . $libelle_photo[0]->libelle_photo;
        unlink($oldFilename);
        $logger->info("Suppression d'une photo -- DOSSIER IMAGES OK");

        $query = 'DELETE FROM `photo_logement` WHERE id_photo = :id';
        $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(
            ':id' => $id
        ));
        $logger->info("Suppression d'une photo -- TABLE PHOTOS LOGEMENT OK");

        $query = 'DELETE FROM `photos` WHERE id = :id';
        $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array(
            ':id' => $id
        ));
        $logger->info("Suppression d'une photo -- TABLE PHOTOS OK");
        
        echo "<div class='alert alert-success'>Photo supprimée avec succès</div>";
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec lors de la suppression de la photo -- $error");
        echo "<div class='alert alert-danger'>Echec lors de la suppression de la photo</div>";
    }
}else{
    $logger->alert("Echec lors de la suppression de la photo -- Impossible de se connecter à la base de données");
    echo "<div class='alert alert-danger'>Echec lors de la suppression de la photo</div>";
}

