<?php

    //Faire en ajax la fonction js pour ajouter une photo et la faire afficher

    //Si pas d'ajax on enregistre apres
    require_once(dirname(__DIR__).'/class/Logements.php');
    require_once(dirname(__DIR__).'/class/Chambres.php');
    require_once(dirname(__DIR__).'/class/Chambres.php');

    function creationAnnonce($data){
        //Verifier les inputs
        // $inputList = ['titre_logement', 'description_logement', 'type_logement', 'ville', 'photos', 'meuble', 'aides_logement' 'regles']
        // $input_int = ['surface_logement']

        //Verifier 
        //Verifier les inputs
        //On défini pour le traitement un variable qui dira si on peut poursuivre les etapes
        $validationAjout = true; //On met true par defaut
        $inputList = ['titre_logement', 'description_logement', 'type_logement', 'ville'];
        foreach ($inputList as $value) {
            if($data["$value"] == ""){
                $message = "Formulaire incorrect";
                $validationFormulaire = false;
                return array(false, $message, $value);
                exit();
            }
        }

        if($validationAjout){
//Si ok on ajoute les photos puis on ajoute dans les tables d'associations pour chambre et logement
        }

        //Ajouter le logement

        //Ajouter la chambre

        //Ajouter les tables d'associations regles et equipements
    }