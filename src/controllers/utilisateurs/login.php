<?php

require_once(dirname(dirname(__DIR__)).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer; //appel de la librairie sanitizer(desinfection)

$error = null;

//Validation des données cote serveur + securite specialchars
//contrôle des champs input si c'est vide
$inputRequired = ['email', 'password'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){ 
        $error = true;
        $logger->info("Champs vides de connexion -- VERIF SERVEUR NOK"); //NOK= non OK
        $_SESSION['flash'] = array('Error', "Echec lors de la connexion au compte","Erreur dans le formulaire </br> Veuillez vérifier votre email ou votre mot de passe");
        header('Location: http://127.0.0.1:8000/src/pages/seconnecter.php');
      
        exit();
    }
}
$logger->info("Champs de connexion rempli -- VERIF SERVEUR OK");
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

        try{

            //COMPARAISON DE L'EMAIL AVEC LA TABLE UTILISATEURS
            $query = 'SELECT * FROM `utilisateurs` INNER JOIN `roles` ON utilisateurs.id_role = roles.id WHERE `email`=:email';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':email' => $data_sanitized['email']   
            ));
            $resultat = $sth->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Comparaison de l'email avec la table utilisateur -- EMAIL / TABLE UTILISATEUR OK");

            //COMPARAISON DU PASSWORD AVEC LA TABLE UTILISATEURS
           
            if (!$resultat){
                // echo 'Mauvais identifiant ou mot de passe!';
                $_SESSION['flash'] = array('Error',"Echec lors de la connexion au compte", "Mauvais identifiant ou mot de passe!!");
                header('Location: http://127.0.0.1:8000/src/pages/seconnecter.php');
            } else {
                $passwordCorrect = password_verify($data_sanitized['password'],$resultat[0]->password);
                if ($passwordCorrect){

                    $_SESSION['flash'] = array('Success', "Connexion avec succès");
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['role'] = $resultat[0]->libelle_role; //faire jointure
                    $_SESSION['id_utilisateur'] = $resultat[0]->id;
                    header('Location: http://127.0.0.1:8000/src/pages/home.php');
                    
                }else{
                    echo 'Mauvais identifiant ou mot de passe !';
                    //var_dump($data_sanitized);
                    //var_dump($resultat[0]->password);
                    $_SESSION['flash'] = array('Error',"Echec lors de la connexion au compte", "Mauvais identifiant ou mot de passe!!!");
                    header('Location: http://127.0.0.1:8000/src/pages/seconnecter.php');
                }
            }


            //$query = 'SELECT `password` FROM `utilisateurs` WHERE `email`=:email';
            //$sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            //$sth->execute(array(
            //  ':password' => $data_sanitized['password']            
           // ));
           // $password = $sth->fetchAll(PDO::FETCH_OBJ);
           // $logger->info("Comparaison de password avec la table utilisateur -- password / TABLE UTILISATEUR OK");

            // On complete les valeurs pour session
           
            
        }catch(PDOException $e){
            $error = $e->getMessage();
          
            $logger->error("'Mauvais identifiant ou mot de passe!' -- $error");
            // http_response_code(400);
            $_SESSION['flash'] = array('Error',"Echec lors de laconnexion de compte", "Mauvais identifiant ou mot de passe!");
            header('Location: http://127.0.0.1:8000/src/pages/seconnecter.php');
            
        }
    }else{
        $logger->alert("Echec de la connexion -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec de la connexion","Echec lors de la connexion </br> Impossible de se connecter à la base de données");
        header('Location: http://127.0.0.1:8000/src/pages/seconnecter.php');
        
    }
}
