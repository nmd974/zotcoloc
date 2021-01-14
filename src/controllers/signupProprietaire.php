<?php
    require_once(dirname(__DIR__).'/class/Inscription.php');
    function ajoutProprietaire($data){
        //Verifier les inputs
        //On défini pour le traitement un variable qui dira si on peut poursuivre les etapes
        $validationInscription = true; //On met true par defaut
        $inputList = ['nom_proprietaire', 'prenom_proprietaire', 'telephone', 'email', 'password'];
        foreach ($inputList as $value) {
            if($data["$value"] == ""){
                $message = "Formulaire incorrect";
                $validationFormulaire = false;
                return array(false, $message, $value);
                exit();
            }
        }
        //Verifier si password identifques
        if($validationInscription){
            if($data['password'] !== $data['confirm_password']){
                $message = "Le mot de passe ne sont pas identiques";
                $validationInscription = false;
                return array(false, $message, $value);
                exit();
            }else{
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }
        }
        //Faire Le check de l'email en base user
        if($validationInscription){
            $validationFormulaire = Inscription::email_verify();
            if($validationFormulaire[0]){
                foreach($validationFormulaire[1] as $value){
                    if($value->email == $data['email']){
                        $message = "L'adresse email est déjà existante !";
                        $step = 1;
                        $validationInscription = false;
                        return array(false, $message, '');
                        exit();
                    }
                }
            }else{
                $message = 'Erreur serveur :  '.$validationFormulaire[1];
                $validationInscription = false;
                return array(false, $message, '');
                exit();
            }
            
        }
        //Faire l'ajout dans la table utilisateur
        if($validationInscription){
            $validationFormulaire = Inscription::ajoutTableUser($data['id_utilisateur'], $data['email'], $data['password'], 3);
            if(!$validationFormulaire[0]){
                $message = 'Erreur serveur : '. $validationFormulaire[1];
                $validationInscription = false;
                return array(false, $message, '');
                exit();
            }
        }
        //Faire l'ajout dans la table particulier
        if($validationInscription){
            $validationFormulaire = Inscription::ajoutTableProprietaire($data['id_proprietaire'], $data['id_utilisateur'], $data['nom_proprietaire'], $data['prenom_proprietaire'], (int)$data['telephone']);
            if(!$validationFormulaire[0]){
                $message = 'Erreur serveur : '. $validationFormulaire[1];
                $validationInscription = false;
                return array(false, $message, '');
                exit();
            }
        }

        //Gestion de la fin de la fonction
        if($validationInscription){
            $message = "Inscription réussie";
            $step = 0;
            return array(true, $message, '');
            exit();
        }else{
            $message = "Erreur serveur".$validationFormulaire[1];
            $step = 0;
            return array(false, $message, '');
            exit();
        }
    }
?>