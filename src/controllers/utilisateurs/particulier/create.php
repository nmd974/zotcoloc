
<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['email', 'password', 'nom_particulier', 'prenom_particulier', 'date_naissance', 'date_naissance', 'date_disponibilite'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la création de compte");
        header('Location: http://127.0.0.1:8000/src/pages/signupParticulier.php');
        return '<div class="alert alert-danger" id="error_msg">Erreur dans le formulaire </br> Veuillez vérifier les champs</div>';
    }
}
$logger->info("Création d'un nouvel utilisateur -- VERIF SERVEUR OK");
if($error == null) {
    //Coup de sanytol sur les données des formulaires
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'nom_particulier' => $_POST['nom_particulier'],
        'prenom_particulier' => $_POST['prenom_particulier'],
        'date_naissance' => $_POST['date_naissance'],
        'date_disponibilite' => $_POST['date_disponibilite']
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
        'nom_particulier' => 'trim|escape|capitalize|htmlspecialchars',
        'prenom_particulier' => 'trim|escape|capitalize|htmlspecialchars',
        'date_naissance' => 'format_date:Y-m-d, Y-m-d|htmlspecialchars',
        'date_disponibilite' => 'trim|format_date:Y-m-d, Y-m-d|htmlspecialchars',
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $sanitizer->sanitize();
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
                ':id_role' => 4,
                ':email' => $_POST['email'],
                ':password_user' => $_POST['password']
            ));
            $logger->info("Création d'un nouvel utilisateur -- TABLE UTILISATEUR OK");
            //AJOUT TABLE PARTICULIER
            $query = 'INSERT INTO `particulier`(`id`, `id_utilisateur`, `nom`, `prenom`, `pseudo`, `date_naissance`, `date_disponibilite`)
            VALUES (:id, :id_utilisateur, :nom, :prenom, :pseudo, :date_naissance, :date_disponibilite)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id' => $id,
                ':id_utilisateur' => $id_utilisateur,
                ':nom' => $_POST['nom_particulier'],
                ':prenom' => $_POST['prenom_particulier'],
                ':pseudo' => $_POST['prenom_particulier'].$_POST['nom_particulier'],
                ':date_naissance' => $_POST['date_naissance'],
                ':date_disponibilite' => $_POST['date_disponibilite']
            ));
            $logger->info("Création d'un nouvel utilisateur -- TABLE PARTICULIER OK");
            //AJOUT DES INTERETS
            if(isset($_POST['interets'])){
                foreach($_POST['interets'] as $value){
                    $query = 'INSERT INTO `interet_particulier`(`id_particulier`, `id_interet`)
                    VALUES (:id_particulier, :id_interet)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_particulier' => $id,
                        ':id_interet' => htmlspecialchars($value, ENT_QUOTES)
                    ));
                }
            }
            $logger->info("Création d'un nouvel utilisateur -- TABLE INTERETS OK");
            //AJOUT DES VILLES
            if(isset($_POST['villes'])){
                foreach($_POST['villes'] as $value){
                    $query = 'INSERT INTO `ville_particulier`(`particulier_id`, `ville_id`) 
                    VALUES (:particulier_id, :ville_id)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':particulier_id' => $id,
                        ':ville_id' => htmlspecialchars($value, ENT_QUOTES)
                    ));
                }
            }
            $logger->info("Création d'un nouvel utilisateur -- TABLE VILLES OK");
            $db->commit();

            $logger->info("Création d'un nouvel utilisateur -- Role colocataire");
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Compté créé avec succès");
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
