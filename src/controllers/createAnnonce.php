<?php

    //Faire en ajax la fonction js pour ajouter une photo et la faire afficher

    //Si pas d'ajax on enregistre apres
    require_once(dirname(__DIR__).'/class/Logements.php');
    require_once(dirname(__DIR__).'/class/Chambres.php');
    require_once(dirname(__DIR__).'/class/Photos.php');
    require_once(dirname(__DIR__).'/controllers/imageControl.php');
    date_default_timezone_set("Indian/Reunion");//On definie la timezone à la reunion
    function creationAnnonce($data, $image, $id_utilisateur){
        //Verifier les inputs
        // $inputList = ['titre_logement', 'description_logement', 'type_logement', 'ville', 'photos', 'meuble', 'aides_logement' 'regles']
        // $input_int = ['surface_logement']

        //Verifier 
        //Verifier les inputs
        //On défini pour le traitement un variable qui dira si on peut poursuivre les etapes
        $validationFormulaire = true; //On met true par defaut
        $inputList = ['titre_logement', 'description_logement', 'type_logement', 'ville'];
        foreach ($inputList as $value) {
            if($data["$value"] == ""){
                $message = "Formulaire incorrect";
                $validationFormulaire = false;
                return array(false, $message, $value);
                exit();
            }
        }
        //Ajouter le logement
        if($validationFormulaire){
            //Transformation en htmlentities
            $titre_logement = htmlentities($data['titre_logement'], ENT_QUOTES);
            $description_logement = htmlentities($data['description_logement'], ENT_QUOTES);
            $surface_logement = htmlentities($data['surface_logement'], ENT_QUOTES);
            $age_max = htmlentities($data['age_max'], ENT_QUOTES);
            $age_min = htmlentities($data['age_min'], ENT_QUOTES);
            $ajoutLogement = Logements::createLogement($data['id_logement'], $data['profil'], $data['ville'], $id_utilisateur, $titre_logement, $description_logement, $surface_logement, $meuble, $eligible_aides, $candidature_facile, $age_max, $age_min, time());
            if(!$ajoutLogement[0]){
                $message = "Erreur serveur : ". $ajoutLogement[1];
                $validationFormulaire = false;
                return array(false, $message);
                exit();
            }
        }
        //Ajouter la chambre
        if($validationFormulaire){
            $list_id_chambre =[];
            for ($i=0; $i < $nb_chambre; $i++) { 
                //Transformation en htmlentities
                $titre_chambre = htmlentities($data['titre_chambre'][$i], ENT_QUOTES);
                $description_chambre = htmlentities($data['description_chambre'][$i], ENT_QUOTES);
                $surface_logement = htmlentities($data['surface_logement'][$i], ENT_QUOTES);
                $type_chambre = htmlentities($data['type_chambre'][$i], ENT_QUOTES);
                $date_disponibilite = htmlentities($data['date_disponibilite'][$i], ENT_QUOTES);
                $duree_bail = htmlentities($data['duree_bail'][$i], ENT_QUOTES);
                $loyer = htmlentities($data['loyer'][$i], ENT_QUOTES);
                $charges = htmlentities($data['charges'][$i], ENT_QUOTES);
                $caution = htmlentities($data['caution'][$i], ENT_QUOTES);
                $frais_dossier = htmlentities($data['frais_dossier'][$i], ENT_QUOTES);
                $id_chambre = md5(uniqid(rand(), true));
                array_push($list_id_chambre, $id);

                $ajoutLogement = Logements::createLogement($id_chambre, $id_logement, $titre_chambre, $description_chambre, $surface_chambre, $type_chambre, $data["a_louer_".$id], $date_disponibilite, $duree_bail, $loyer, $charges, $caution, $frais_dossier);
                
                if(!$ajoutLogement[0]){
                    $message = "Erreur serveur : ". $ajoutLogement[1];
                    $validationFormulaire = false;
                    return array(false, $message);
                    exit();
                }
            }
            
        }

        if($validationFormulaire){
            //Si ok on ajoute les photos puis on ajoute dans les tables d'associations pour chambre et logement
            $cpt = 0;
            foreach($image['photos_logement'] as $image){
                $ajoutImage = controleImage($image, $cpt);
                if(!$ajoutImage[0]){
                    $message = "Erreur lors de l'ajout de la photo";
                    $validationFormulaire = false;
                    return array(false, $message);
                    exit();
                }else{
                    $ajoutPhotoLogement = Photos::photoLogement($data['id_logement'], $ajoutImage[1]);
                    if(!$ajoutPhotoLogement[0]){
                        $message = "Erreur serveur : ". $ajoutPhotoLogement[1];
                        $validationFormulaire = false;
                        return array(false, $message);
                        exit();
                    }else{
                        $cpt++;
                    }
                }
            }

            $cpt = 0;
            //On verifie le nombre de chambres ajoutées
            $nb_chambre = count($data['titre_chambre']);
            for ($i=0; $i < $nb_chambre; $i++) { 
                foreach($image['photos_chambre_'.$i] as $image){
                    $ajoutImage = controleImage($image, $cpt);
                    if(!$ajoutImage[0]){
                        $message = "Erreur lors de l'ajout de la photo";
                        $validationFormulaire = false;
                        return array(false, $message);
                        exit();
                    }else{
                        $ajoutPhotoChambre = Photos::photoChambre($list_id_chambre[$id], $ajoutImage[1]);
                        if(!$ajoutPhotoChambre[0]){
                            $message = "Erreur serveur : ". $ajoutPhotoChambre[1];
                            $validationFormulaire = false;
                            return array(false, $message);
                            exit();
                        }else{
                            $cpt++;
                        }
                    }
                }
            }

        }
        
        //Ajouter les tables d'associations regles et equipements
        
        if($validationFormulaire){
            //Si ok on ajoute les photos puis on ajoute dans les tables d'associations pour chambre et logement
            $cpt = 0;
            foreach($data['regles'] as $regle){
                $ajoutRegleLogement = Regles::reglesLogement($data['id_logement'],  $regle);
                if(!$ajoutRegleLogement[0]){
                    $message = "Erreur serveur : ". $ajoutRegleLogement[1];
                    $validationFormulaire = false;
                    return array(false, $message);
                    exit();
                }else{
                    $cpt++;
                }
            }

            $cpt = 0;
            foreach($data['equipements_logement'] as $equipement){
                $ajoutEqtLogement = Equipements::equipementLogement($data['equipements_logement'],  $equipement);
                if(!$ajoutEqtLogement[0]){
                    $message = "Erreur serveur : ". $ajoutEqtLogement[1];
                    $validationFormulaire = false;
                    return array(false, $message);
                    exit();
                }else{
                    $cpt++;
                }
            }

            $cpt = 0;

            for ($i=0; $i < $nb_chambre; $i++) { 
                foreach($data['equipements_chambre_'.$i] as $eqtChambre){
                    $ajoutEqtChambre = Equipements::equipementChambre($list_id_chambre[$i], $eqtChambre);
                    if(!$ajoutEqtChambre[0]){
                        $message = "Erreur serveur : ". $ajoutEqtChambre[1];
                        $validationFormulaire = false;
                        return array(false, $message);
                        exit();
                    }else{
                        $cpt++;
                    }
                }
            }

        }

    }