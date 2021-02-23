<?php

require_once(dirname(dirname(__DIR__)).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

if($error == null) {
    //Coup de sanytol sur les données des formulaires
    $data = [
        'email' => $_REQUEST['email']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        'email' => 'trim|escape|lowercase|htmlspecialchars',
    ];
    
    $sanitizer = new Sanitizer($data, $filters, $customFilter);
    $sanitizer->sanitize();
    
    //Connexion à la BDD
    $db = Connection::getPDO();
    $doublon = false;
    if($db){
        try{
            //AJOUT TABLE UTILISATEURS
            $query = 'SELECT * FROM `utilisateurs`'; 
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute();
            $liste_email = $sth->fetchAll(PDO::FETCH_OBJ);
            foreach ($liste_email as $value) {
                if($value->email == $_REQUEST['email']){
                    $doublon = true;
                    $logger->info("Verification d'email en double -- Email en double detecté");
                    http_response_code(202);
                    echo "L'adresse email est déjà existante";
                }
            }

            if(!$doublon){
                http_response_code(200);
                echo "Adresse email valide";
            }

        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec de la vérification d'adresse email en doublon'-- $error");
            http_response_code(400);
            echo "Echec de la vérification d'adresse email en doublon </br> $error";
        }
    }else{
        $logger->alert("Echec lors de la vérification d'adresse email en doublon -- Impossible de se connecter à la base de données");
        http_response_code(503);
        echo "Echec lors de la vérification d'adresse email en doublon </br> Impossible de se connecter à la base de données";
    }
}
