<?php

    //Faire en ajax la fonction js pour ajouter une photo et la faire afficher

    //Si pas d'ajax on enregistre apres
    require_once(dirname(__DIR__).'/class/Logements.php');
    require_once(dirname(__DIR__).'/class/Chambres.php');
    require_once(dirname(__DIR__).'/class/Photos.php');
    require_once(dirname(__DIR__).'/class/Equipements.php');
    require_once(dirname(__DIR__).'/class/Regles.php');
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
            $type_logement = htmlentities($data['type_logement'], ENT_QUOTES);
            if(!isset($data['aides_logement'])){
                $data['aides_logement'] = 0;
            }
            
            $ajoutLogement = Logements::createLogement($data['id_logement'], $data['profil'], $data['ville'], $id_utilisateur, $titre_logement, $description_logement, $surface_logement, $data['meuble'], $data['aides_logement'], 0, $age_max, $age_min, $type_logement);
            if(!$ajoutLogement[0]){
                $message = "Erreur serveur : ". $ajoutLogement[1];
                $validationFormulaire = false;
                return array(false, $message);
                exit();
            }
        }
        //Ajouter la chambre
        if($validationFormulaire){
            $nb_chambre = count($data['titre_chambre']);
            $list_id_chambre =[];
            for ($i=0; $i < $nb_chambre; $i++) { 
                //Transformation en htmlentities
                // $input_to_verify = ["titre_chambre", "description_chambre", "surface_logement", "type_chambre", "date_disponibilite", "duree_bail", "loyer", "charges", "caution", "frais_dossier"];
                // foreach($input_to_verify as $input){
                //     if()
                // }
                $indice = $i + 1;
                $titre_chambre = htmlentities($data['titre_chambre'][$i], ENT_QUOTES);
                $description_chambre = htmlentities($data['description_chambre'][$i], ENT_QUOTES);
                $surface_chambre = (int)htmlentities($data["surface_chambre_".$indice], ENT_QUOTES);
                $type_chambre = htmlentities($data["type_chambre_".$indice], ENT_QUOTES);
                //Contrôle de la date => On recupere les morceaux et on converti en int
                if(strlen($data['date_disponibilite'][$i]) < 10 || substr($data['date_disponibilite'][$i],4,1) !== "-" || substr($data['date_disponibilite'][$i],7,1) !== "-" ||strlen($data['date_disponibilite'][$i]) > 10){
                    $message = "Le format de la date de disponibilite est incorrecte !";
                    $step = 2;
                    $validationInscription = false;
                    return array(false, $message, $step);
                    exit();
                }
                $date_disponibilite = $data['date_disponibilite'][$i];
                $duree_bail = htmlentities($data['duree_bail'][$i], ENT_QUOTES);
                $loyer = htmlentities($data['loyer'][$i], ENT_QUOTES);
                $charges = htmlentities($data['charge'][$i], ENT_QUOTES);
                $caution = htmlentities($data['caution'][$i], ENT_QUOTES);
                $frais_dossier = htmlentities($data['frais_dossier'][$i], ENT_QUOTES);
                $id_chambre = md5(uniqid(rand(), true));
                $a_louer_indice = $data["a_louer_".$indice];
                array_push($list_id_chambre, $id_chambre);
                // return gettype($date_disponibilite);
                $ajoutLogement = Chambres::createChambre($id_chambre, $data['id_logement'], $titre_chambre, $description_chambre, $surface_chambre, $type_chambre, $data["a_louer_".$indice], $date_disponibilite, $duree_bail, $loyer, $charges, $caution, $frais_dossier);
                
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
            $indice_nb_photo = count($image['photos_logement']['name']);
            for ($i=0; $i < $indice_nb_photo; $i++) { 
                $ajoutImage = controleImageArray($image['photos_logement'], $i);
                if($ajoutImage[0]){ //La fonction retourne false si erreur
                    $message = "Erreur lors de l'ajout de la photo";
                    $validationFormulaire = false;
                    return array(false, $message);
                    exit();
                }else{
                    $id_photo = md5(uniqid(rand(), true));
                    $ajoutPhoto = Photos::photoTableGenerale($id_photo, $ajoutImage[1]);
                    if(!$ajoutPhoto[0]){
                        $message = "Erreur serveur table photo : ". $ajoutPhoto[1];
                        $validationFormulaire = false;
                        return array(false, $message);
                        exit();
                    }else{
                        $ajoutPhotoLogement = Photos::photoLogement($data['id_logement'], $id_photo);
                        if(!$ajoutPhotoLogement[0]){
                            $message = "Erreur serveur table photo logement: ". $ajoutPhotoLogement[1];
                            $validationFormulaire = false;
                            return array(false, $message);
                            exit();
                        }
                    }
                }
            }
            $nb_chambre = count($data['titre_chambre']);
            $indice = $i + 1;
            // return $nb_chambre;
            for ($i=0; $i < $nb_chambre; $i++) { 
                    $indice = $i + 1;
                $indice_nb_photo = count($image['photos_chambre_'.$indice]['name']);
                for ($i=0; $i < $indice_nb_photo; $i++) { 
                    $ajoutImage = controleImageArray($image['photos_chambre_'.$indice], $i);
                    if($ajoutImage[0]){ //La fonction retourne false si erreur
                        $message = "Erreur lors de l'ajout de la photo";
                        $validationFormulaire = false;
                        return array(false, $message);
                        exit();
                    }else{
                        $id_photo = md5(uniqid(rand(), true));
                        $ajoutPhoto = Photos::photoTableGenerale($id_photo, $ajoutImage[1]);
                        if(!$ajoutPhoto[0]){
                            $message = "Erreur serveur table photo : ". $ajoutPhoto[1];
                            $validationFormulaire = false;
                            return array(false, $message);
                            exit();
                        }else{
                            $ajoutPhotoChambre = Photos::photoChambre($list_id_chambre[$i], $id_photo);
                            if(!$ajoutPhotoChambre[0]){
                                $message = "Erreur serveur Table chambre photo: ". $ajoutPhotoChambre[1];
                                $validationFormulaire = false;
                                return array(false, $message);
                                exit();
                            }
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
                $ajoutEqtLogement = Equipements::equipementLogement($data['id_logement'],  $equipement);
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
                $indice = $i + 1;
                // return $data['equipements_chambre_'.$indice];
                foreach($data['equipements_chambre_'.$indice] as $eqtChambre){
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