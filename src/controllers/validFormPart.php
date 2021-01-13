<?php
    require_once(dirname(__DIR__).'/class/Inscription.php');
    require_once(dirname(__DIR__).'/class/Interets.php');
    require_once(dirname(__DIR__).'/class/Villes.php');
    session_start();
    function validation ($data){
        $validationInscription = true;
        $message = "";
        $step = 0;
        //Verification si l'email n'est pas en double
        $liste_email = Inscription::email_verify();
        // $validation_email = true;
        if($liste_email[0]){
            foreach ($liste_email[1] as $value) {
                if($value->email == $data['email']){
                    $message = "L'adresse email est déjà existante !";
                    $step = 1;
                    $validationInscription = false;
                    return array(false, $message, $step);
                    exit();
                }
            }
        }else{
            $message = `<div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>`;
            $step = 0;
            $validationInscription = false;
            return array(false, $message, $step);
        }

        //Faire la verification de chaque input par javascript

        //Verification des dates
        
        //Contrôle de la date => On recupere les morceaux et on converti en int
        if(strlen($data['date_naissance']) < 10 || substr($data['date_naissance'],4,1) !== "-" || substr($data['date_naissance'],7,1) !== "-" ||strlen($data['date_naissance']) > 10){
            $message = "Le format de la date de naissance est incorrecte !";
            $step = 2;
            $validationInscription = false;
            return array(false, $message, $step);
            exit();
        }else{
            //Apres la verification des heures et minutes on peut modifier la valeur du $_POST en secondes
            $year = intval(substr($_POST['date_naissance'],0,4));
            $month = intval(substr($_POST['date_naissance'],5,2));
            $day = intval(substr($_POST['date_naissance'],8,2));
            $data['date_naissance'] = mktime(0, 0, 0, $month, $day, $year);
            //On verifie que la date n'est pas inférieure à la date actuelle
            if(mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")) > $data['date_naissance']){
                $message = "Le format de la date de naissance est dans le futur !";
                $step = 2;
                $validationInscription = false;
                return array(false, $message, $step);
                exit();
            }
        }
        //Contrôle de la date => On recupere les morceaux et on converti en int
        if(strlen($data['date_disponibilite']) < 10 || substr($data['date_disponibilite'],4,1) !== "-" || substr($data['date_disponibilite'],7,1) !== "-" ||strlen($data['date_naissance']) > 10){
            $message = "Le format de la date de disponibilité est incorrecte !";
            $step = 2;
            $validationInscription = false;
            return array(false, $message, $step);
            exit();
        }else{
            //Apres la verification des heures et minutes on peut modifier la valeur du $_POST en secondes
            $year = intval(substr($_POST['date_disponibilite'],0,4));
            $month = intval(substr($_POST['date_disponibilite'],5,2));
            $day = intval(substr($_POST['date_disponibilite'],8,2));
            $data['date_disponibilite'] = mktime(0, 0, 0, $month, $day, $year);
        }

        //Si les verification sont ok alors on traite pour l'envoie des données
        if($validationInscription){
            //On hash le mot de passe
            $data['password'] = htmlentities($_POST['password'], ENT_QUOTES);
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $password = $data['password'];
            $email = htmlentities($data['email'], ENT_QUOTES);
            $nom = htmlentities($data['nom'], ENT_QUOTES);
            $prenom = htmlentities($data['prenom'], ENT_QUOTES);
            $date_disponibilite = htmlentities($data['date_disponibilite'], ENT_QUOTES);
            $date_naissance = htmlentities($data['date_naissance'], ENT_QUOTES);
            $id_utilisateur = md5(uniqid(rand(), true));

            //On ajoute dans la base utilisateur
            $validationInscription = Inscription::ajoutTableUser($id_utilisateur, $email, $password); 
            if($validationInscription[0]){
                $id = md5(uniqid(rand(), true));
                $pseudo = $nom.$prenom;
                $validationInscription = Inscription::ajoutTableParticulier($id, $utilisateur_id, $nom, $prenom, $pseudo);
                if($validationInscription){
                    if(isset($_SESSION['liste_interets'])){
                        foreach($_SESSION['liste_interets'] as $value){
                            Interets::ajoutInteretsParticulier($id, $value);
                        }
                    }
                    if(isset($_SESSION['liste_ville'])){
                        foreach($_SESSION['liste_ville'] as $value){
                            Villes::ajoutVilleParticulier($id, $value);
                        }
                    }

                }
            }
        }
        
    }
?>