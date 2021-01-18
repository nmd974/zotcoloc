<?php
/*
    Amelioration : pour que ce soit plus clean il faudra faire la securité des inputs et la validation puis si tout est ok
    on appelle une fonction qui va se charger de faire toutes les requetes et recuperer les erreurs s'il y en a

*/

    require_once(dirname(__DIR__).'/class/Inscription.php');
    require_once(dirname(__DIR__).'/class/Interets.php');
    require_once(dirname(__DIR__).'/class/Villes.php');
    date_default_timezone_set("Indian/Reunion");//On definie la timezone à la reunion
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
            exit();
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
            //Apres la verification des heures et minutes on peut modifier la valeur du $data en secondes
            $year = intval(substr($data['date_naissance'],0,4));
            $month = intval(substr($data['date_naissance'],5,2));
            $day = intval(substr($data['date_naissance'],8,2));
            //On verifie que la date n'est pas inférieure à la date actuelle
            if(time() < $data['date_naissance']){
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
        }

        //Si les verification sont ok alors on traite pour l'envoie des données
        if($validationInscription){
            //On hash le mot de passe
            $data['password'] = htmlentities($data['password'], ENT_QUOTES);
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $password = $data['password'];
            $email = htmlentities($data['email'], ENT_QUOTES);
            $nom = htmlentities($data['nom_particulier'], ENT_QUOTES);
            $prenom = htmlentities($data['prenom_particulier'], ENT_QUOTES);
            $date_disponibilite = htmlentities($data['date_disponibilite'], ENT_QUOTES);
            $date_naissance = htmlentities($data['date_naissance'], ENT_QUOTES);
            $id_utilisateur = $data['id_utilisateur'];
            
        
            //On ajoute dans la base utilisateur
            $validationInscription = Inscription::ajoutTableUser($id_utilisateur, $email, $password, 4); //Mettre la condition si pas bvon
            if(!$validationInscription[0]){
                $message = 'Erreur serveur : '. $validationInscription[1];
                $step = 0;
                $validationInscription = false;
                return array(false, $message, $step);
                exit();
            }else{
                $id = $data['id_particulier'];
                $pseudo = $nom.$prenom;
                //Si tout est ok pour la table utilisateur alors on lance la requete vers la table particulier
                $validationInscription = Inscription::ajoutTableParticulier($id, $id_utilisateur, $nom, $prenom, $pseudo, $date_naissance, $date_disponibilite);
                //Si tout est ok pour la table particulier alors on lance la requete vers la table d'association des interets du particulier
                if($validationInscription[0]){
                    if(isset($data['interets'])){
                        foreach($data['interets'] as $value){
                            $validationInscription = Interets::ajoutInteretsParticulier($id, $value);
                        }
                    }
                    if(isset($data['villes'])){
                        var_dump($data['villes']);
                        foreach($data['villes'] as $value){
                            $validationInscription = Villes::ajoutVilleParticulier($id, $value);
                        }
                    }
                }
                if($validationInscription[0]){
                    $message = "Inscription réussie";
                    $step = 0;
                    return array(true, $message, $step);
                    exit();
                }else{
                    $message = "Erreur serveur".$validationInscription[1];
                    $step = 0;
                    return array(false, $message, $step);
                    exit();
                }
            }
        }        
    }
?>