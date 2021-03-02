
<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['email', 'password', 'nom_proprietaire', 'prenom_proprietaire', 'telephone'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/authentificationLoueur.php");
        // return '<div class="alert alert-danger" id="error_msg">Erreur dans le formulaire </br> Veuillez vérifier les champs</div>';
    }
}
$logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR OK");
if($error == null) {
    //Coup de sanytol sur les données des formulaires
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'nom_proprietaire' => $_POST['nom_proprietaire'],
        'prenom_proprietaire' => $_POST['prenom_proprietaire'],
        'telephone' => $_POST['telephone']
    ];
    
    $customFilter = [
        'hash' => function($value, $options = []){
            return password_hash($value, PASSWORD_DEFAULT);
        },
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        'email' => 'trim|escape|lowercase|htmlspecialchars',
        'password' => 'hash',
        'nom_proprietaire' => 'trim|escape|capitalize|htmlspecialchars',
        'prenom_proprietaire' => 'trim|escape|capitalize|htmlspecialchars',
        'telephone' => 'digit|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();

    $logger->info("Création d'un nouvel utilisateur -- SANITIZE OK");
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        $id_utilisateur = md5(uniqid(rand(), true));
        $id = md5(uniqid(rand(), true));
        try{
            $db->beginTransaction();
            
            //AJOUT TABLE UTILISATEURS
            $query = 'INSERT INTO `utilisateurs`(`id`, `id_role`, `email`, `password`) 
            VALUES (:id, :id_role, :email, :password_user)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id_utilisateur,
                ':id_role' => 3,
                ':email' => $data_sanitized['email'],
                ':password_user' => $data_sanitized['password']
            ));
            $logger->info("Création d'un nouvel utilisateur -- TABLE UTILISATEUR OK");
            //AJOUT TABLE PROPRIETAIRE
            $query = 'INSERT INTO `proprietaire`(`id`, `id_utilisateur`, `nom`, `prenom`, `telephone`)
            VALUES (:id, :id_utilisateur, :nom, :prenom, :telephone)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
                ':id_utilisateur' => $id_utilisateur,
                ':nom' => $data_sanitized['nom_proprietaire'],
                ':prenom' => $data_sanitized['prenom_proprietaire'],
                ':telephone' => $data_sanitized['telephone']
            ));
            $logger->info("Création d'un nouvel utilisateur -- TABLE PROPRIETAIRE OK");

            $db->commit();

            $logger->info("Création d'un nouvel utilisateur -- Role proprietaire");
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Compte créé avec succès");
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['role'] = "proprietaire";
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            header("Location:" . getenv("URL_APP") . "/src/pages/creationAnnoncePage.php");
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $logger->error("Echec de la création d'un nouvel utilisateur (proprietaire) -- $error");
            // http_response_code(400);
            $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
            header("Location:" . getenv("URL_APP") . "/src/pages/authentificationLoueur.php");
            echo "Echec lors de la création de compte </br> $error";
        }
    }else{
        $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
        header("Location:" . getenv("URL_APP") . "/src/pages/authentificationLoueur.php");
        echo '<div class="alert alert-danger" id="error_msg">Echec lors de l\'inscription </br> Impossible de se connecter à la base de données</div>';
    }
}
