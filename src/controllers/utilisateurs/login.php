
<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['email', 'password'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Connexion d'un utilisateur -- VERIF SERVEUR NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la connexion au compte");
        header('Location: http://127.0.0.1:8000/src/pages/seconnecter.php');
        return '<div class="alert alert-danger" id="error_msg">Erreur dans le formulaire </br> Veuillez vérifier votre email ou votre mot de passe</div>';
    }
}
$logger->info("Connexion d'un utilisateur -- VERIF SERVEUR OK");
if($error == null) {
    //Coup de sanytol sur les données des formulaires
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']   
    ];
    
    $customFilter = [
        
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        'email' => 'trim|escape|lowercase|htmlspecialchars',
        'password' => 'htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();
    $logger->info("Connexion d'un nouvel utilisateur -- SANITIZE OK");
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        $id_utilisateur = md5(uniqid(rand(), true));
        $id = md5(uniqid(rand(), true));
        try{
            $db->beginTransaction();
            
            //COMPARAISON DE L'EMAIL AVEC LA TABLE UTILISATEURS
            $query = 'SELECT * FROM `utilisateurs` WHERE `email`=:email';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':email' => $data_sanitized['email']   
            ));
            $email = $sth->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Comparaison de l'email avec la table utilisateur -- EMAIL / TABLE UTILISATEUR OK");

            //COMPARAISON DU PASSWORD AVEC LA TABLE UTILISATEURS
            $query = 'SELECT * FROM `utilisateurs` WHERE `password`';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
              ':password' => $data_sanitized['password']            
            ));
            $password = $sth->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Comparaison de password avec la table utilisateur -- password / TABLE UTILISATEUR OK");
           



           
            $db->commit();

           
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Connexion avec succès");
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['role'] = "particulier";
            $_SESSION['id_utilisateur'] = $id_utilisateur;
            header('Location: http://127.0.0.1:8000/src/pages/home.php');
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack(); 
            $logger->error("Echec de la créationd d'un nouvel utilisateur (colocataire) -- $error");
            // http_response_code(400);
            $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
            header('Location: http://127.0.0.1:8000/src/pages/signupParticulier.php');
            echo "Echec lors de la création de compte </br> $error";
        }
    }else{
        $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
        header('Location: http://127.0.0.1:8000/src/pages/signupParticulier.php');
        echo '<div class="alert alert-danger" id="error_msg">Echec lors de l\'inscription </br> Impossible de se connecter à la base de données</div>';
    }
}
