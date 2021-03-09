<?php

require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require(__ROOT__ . '/src/libs/gestionLogs.php');
// TODO : Modifier la localisation du dossier imageControl dans le dossier libs
require_once(__ROOT__.'/src/controllers/imageControl.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
if(!$_SESSION['isLoggedIn']){
    $_SESSION['flash'] = array('Error', "Echec de l'opération");
    header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
    $logger->alert("Echec lors de la creation de l'annonce -- PAS CONNECTE");
    exit();
}

//Validation des données cote serveur + securite specialchars
$inputRequired = ['titre_logement', 'description_logement', 'ville', 'titre_chambre', 'description_chambre'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Creation d'une annonce -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce </br> Veuillez vérifier les champs");
        header("Location:" . getenv("URL_APP") . "/src/pages/creationAnnoncePage.php");
        exit();
    }
}
if(empty($_FILES)){
    $error = true;
    $logger->info("Creation d'une annonce -- VERIF INPUT Photos manquantes");
    $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce </br> Veuillez vérifier les champs", "Photos manquantes");
    header("Location:" . getenv("URL_APP") . "/src/pages/creationAnnoncePage.php");
    exit();
}


$logger->info("Creation d'une annonce -- VERIF SERVEUR OK");
if($error == null) {
    //On met à 0 de base si pas selectionne
    if(!isset($_POST['aides_logement'])){
        $_POST['aides_logement'] = 0;
    };
    if(!isset($_POST['meuble'])){
        $_POST['meuble'] = 0;
    };
    //Verification de la saisie du type de logement
    if($_POST['type_logement'] != "Appartement" || $_POST['type_logement'] != "Villa" || $_POST['type_logement'] != "Maison"){
        $_POST['type_logement'] != "Maison";
    }
    //Verification de la saisie du type de PROFIL
    if($_POST['profil'] != "eccbc87e4b5ce2fe28308fd9f2a7baf3" || $_POST['profil'] != "c81e728d9d4c2f636f067f89cc14862c" || $_POST['profil'] != "c4ca4238a0b923820dcc509a6f75849b" || $_POST['profil'] == ""){
        $_POST['profil'] = "eccbc87e4b5ce2fe28308fd9f2a7baf3";
    }
    //Coup de sanytol sur les données des formulaires
    
    $data = [
        'titre_logement' => $_POST['titre_logement'],
        'description_logement' => $_POST['description_logement'],
        'type_logement' => $_POST['type_logement'],
        'ville' => $_POST['ville'],
        'surface_logement' => $_POST['surface_logement'],
        'aides_logement' => $_POST['aides_logement'],
        'age_max' => $_POST['age_max'],
        'age_min' => $_POST['age_min']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    //le digit en sanitize si string ca remplace par du vide
    $filters = [
        'titre_logement' => 'trim|escape|capitalize|htmlspecialchars',
        'description_logement' => 'trim|escape|capitalize|htmlspecialchars',
        'type_logement' => 'trim|escape|capitalize|htmlspecialchars',
        'ville' => 'trim|escape|htmlspecialchars',
        'surface_logement' => 'trim|escape|htmlspecialchars|digit',
        'aides_logement' => 'trim|escape|htmlspecialchars|digit',
        'age_max' => 'trim|digit|htmlspecialchars',
        'age_min' => 'trim|digit|htmlspecialchars'
    ];
    
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();
    if($data_sanitized['ville'] == 0){
        $data_sanitized['ville'] = 4; //Si 0 alors tentative de modification de la value on met alors St denis
    }
    $logger->info("Creation d'une annonce -- SANITIZE OK");
    
    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        $id_logement = md5(uniqid(rand(), true));
        $id = md5(uniqid(rand(), true));
        try{
            $db->beginTransaction();
            
            //Verification des villes
            $query = $db->query("SELECT * FROM `villes`");
            $data_villes = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($data_villes as $data_ville){
                $list_villes[] = $data_ville->id;
            }
            if(in_array($data_sanitized['ville'], $list_villes)){
                $logger->info("Creation d'une annonce -- VERIFICATION VILLE OK");
            }else{
                $data_sanitized['ville'] = 4;
                $logger->alert("Creation d'une annonce -- ID VILLE NON TROUVE");
            }
            
            //AJOUT TABLE LOGEMENTS
            $query = 'INSERT INTO `logements`(`id_logement`, `id_profil`, `id_ville`, `id_utilisateur`, `titre_logement`, `description_logement`, `surface_logement`, `meuble`, `eligible_aides`, `age_max`, `age_min`, `type_logement`)
            VALUES (:id_logement, :id_profil, :id_ville, :id_utilisateur, :titre_logement, :description_logement, :surface_logement, :meuble, :eligible_aides, :age_max, :age_min, :type_logement)';
            $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute(array(
                ':id_logement' => $id_logement,
                ':id_profil' => $_POST['profil'],
                ':id_ville' => $data_sanitized['ville'],
                ':id_utilisateur' => $_SESSION['id_utilisateur'],
                ':titre_logement' => $data_sanitized['titre_logement'],
                ':description_logement' => $data_sanitized['description_logement'],
                ':surface_logement' => $data_sanitized['surface_logement'],
                ':meuble' => $_POST['meuble'],
                ':eligible_aides' => $_POST['aides_logement'],
                ':age_max' => $data_sanitized['age_max'],
                ':age_min' => $data_sanitized['age_min'],
                ':type_logement' => $data_sanitized['type_logement']
            ));
            $logger->info("Creation d'une annonce -- TABLE LOGEMENT OK");
            
            //AJOUT TABLE CHAMBRES
            $nb_chambre = count($_POST['titre_chambre']);
            $list_id_chambre =[];
            for ($i=0; $i < $nb_chambre; $i++) {
                $indice = $i + 1;
                
                //On stock les id afin de les traiter pour les photos et les equipements
                $id_chambre = md5(uniqid(rand(), true));
                array_push($list_id_chambre, $id_chambre);
                
                //Filtre sur les valeurs non obligatoire
                if($_POST['type_chambre_'.$indice] != "Chambre principale" || $_POST['type_chambre_'.$indice] != "Chambre secondaire"){
                    $_POST['type_chambre_'.$indice] = "Chambre principale";
                }
                if($_POST['a_louer_'.$indice] != "0" || $_POST['a_louer_'.$indice] != "1"){
                    $_POST['a_louer_'.$indice] = "0";
                }
                //On sanytol les données
                $data = [
                    'titre_chambre' => $_POST['titre_chambre'][$i],
                    'description_chambre' => $_POST['description_chambre'][$i],
                    'surface_chambre' => $_POST['surface_chambre'][$i],
                    'type_chambre' => $_POST['type_chambre_'.$indice],
                    'date_disponibilite' => $_POST['date_disponibilite'][$i],
                    'duree_bail' => $_POST['duree_bail'][$i],
                    'loyer' => $_POST['loyer'][$i],
                    'charges' => $_POST['charges'][$i],
                    'caution' => $_POST['caution'][$i],
                    'frais_dossier' => $_POST['frais_dossier'][$i],
                    'a_louer' => $_POST['a_louer_'.$indice]
                ];
                $filters = [
                    'titre_chambre' => 'trim|escape|capitalize|htmlspecialchars',
                    'description_chambre' => 'trim|escape|capitalize|htmlspecialchars',
                    'surface_chambre' => 'trim|escape|htmlspecialchars|digit',
                    'type_chambre' => 'trim|escape|htmlspecialchars',
                    'date_disponibilite' => 'trim|format_date:Y-m-d, Y-m-d|htmlspecialchars',
                    'duree_bail' => 'trim|escape|digit|htmlspecialchars',
                    'loyer' => 'trim|escape|digit|htmlspecialchars',
                    'charges' => 'trim|escape|digit|htmlspecialchars',
                    'caution' => 'trim|escape|digit|htmlspecialchars',
                    'frais_dossier' => 'trim|escape|digit|htmlspecialchars',
                    'a_louer' => 'trim|escape|digit|htmlspecialchars',
                ];
                
                $sanitizer = new Sanitizer($data, $filters,  $customFilter);
                $data_sanitized = $sanitizer->sanitize();
                
                //AJOUT TABLE CHAMBRE
                $query = 'INSERT INTO `chambres`(`id_chambre`, `id_logement`, `titre_chambre`, `description_chambre`, `surface_chambre`, `type_chambre`, `a_louer`, `date_disponibilite`, `duree_bail`, `loyer`, `charges`, `caution`, `frais_dossier`)
                VALUES (:id_chambre, :id_logement, :titre_chambre, :description_chambre, :surface_chambre, :type_chambre, :a_louer, :date_disponibilite, :duree_bail, :loyer, :charges, :caution, :frais_dossier)';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_chambre' => $id_chambre,
                    ':id_logement' => $id_logement,
                    ':titre_chambre' => $data_sanitized['titre_chambre'],
                    ':description_chambre' => $data_sanitized['description_chambre'],
                    ':surface_chambre' => $data_sanitized['surface_chambre'],
                    ':type_chambre' => $data_sanitized['type_chambre'],
                    ':a_louer' => $data_sanitized['a_louer'],
                    ':date_disponibilite' => $data_sanitized['date_disponibilite'],
                    ':duree_bail' => $data_sanitized['duree_bail'],
                    ':loyer' => $data_sanitized['loyer'],
                    ':charges' => $data_sanitized['charges'],
                    ':caution' => $data_sanitized['caution'],
                    ':frais_dossier' => $data_sanitized['frais_dossier']
                ));
                $logger->info("Creation d'une annonce -- TABLE CHAMBRE OK");
            }
            
            //GESTION DES PHOTOS DU LOGEMENT
            $indice_nb_photo = count($_FILES['photos_logement']['name']);
            for ($i=0; $i < $indice_nb_photo; $i++) { 
                $ajoutImage = controleImageArray($_FILES['photos_logement'], $i);
                if($ajoutImage[0]){ //La fonction retourne true si erreur
                    $logger->alert("Creation d'une annonce -- Erreur lors de l'ajout de l'image logement");
                }else{
                    $id_photo = md5(uniqid(rand(), true));
                    //AJOUT TABLE PHOTOS GENERALE
                    $query = 'INSERT INTO `photos`(`id`, `libelle_photo`)
                    VALUES (:id, :libelle_photo)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id' => $id_photo,
                        ':libelle_photo' => $ajoutImage[1]
                    ));
                    $logger->info("Creation d'une annonce -- TABLE PHOTOS OK");
                    //AJOUT TABLE PHOTO LOGEMENT
                    $query = 'INSERT INTO `photo_logement`(`id_logement`, `id_photo`)
                    VALUES (:id_logement, :id_photo)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_logement' => $id_logement,
                        ':id_photo' => $id_photo
                    ));
                    $logger->info("Creation d'une annonce -- TABLE PHOTO LOGEMENT OK");
                }
            }
            //GESTION DES PHOTOS DES CHAMBRES
            // TODO : lorsde l'ajout d'une nouvelle chambre on ajoute les regles associees et si pas rempli alors l'utilisateur devra supprimer le bloc ainsi que pour les photos
            $nb_chambre = count($_POST['titre_chambre']);
            for ($i=1; $i <= $nb_chambre; $i++) { 
                $indice_nb_photo = count($_FILES['photos_chambre_'.$i]['name']);
                for ($i2=0; $i2 <= $indice_nb_photo; $i2++) { 
                    $ajoutImage = controleImageArray($_FILES['photos_chambre_'.$i], $i2);
                    if($ajoutImage[0]){ //La fonction retourne true si erreur
                        $logger->alert("Creation d'une annonce -- Erreur lors de l'ajout de l'image chambre");
                    }else{
                        $id_photo = md5(uniqid(rand(), true));
                        //AJOUT TABLE PHOTOS GENERALE
                        $query = 'INSERT INTO `photos`(`id`, `libelle_photo`)
                        VALUES (:id, :libelle_photo)';
                        $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                        $sth->execute(array(
                            ':id' => $id_photo,
                            ':libelle_photo' => $ajoutImage[1]
                        ));
                        $logger->info("Creation d'une annonce -- TABLE PHOTOS OK");
                        //AJOUT TABLE PHOTO CHAMBRE
                        $query = 'INSERT INTO `photo_chambre`(`id_chambre`, `id_photo`)
                        VALUES (:id_chambre, :id_photo)';
                        $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                        $sth->execute(array(
                            ':id_chambre' => $list_id_chambre[$i-1],
                            ':id_photo' => $id_photo
                        ));
                        $logger->info("Creation d'une annonce -- TABLE PHOTO CHAMBRE OK");
                    }
                }
            }
            
            //GESTION DES REGLES LOGEMENT
            //On recupere la liste des regles afin de verifier si un malin n'a pas modifié les valeurs
            //Si oui alors on n'ajoute pas la regle
            $query = $db->query("SELECT * FROM `regles`");
            $data_regles = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($data_regles as $data_regle){
                $list_regles[] = $data_regle->id;
            }
            foreach($_POST['regles'] as $regle){
                if(in_array($regle, $list_regles)){
                    $query = 'INSERT INTO `regle_logement`(`id_logement`, `id_regle`)
                    VALUES (:id_logement, :id_regle)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_logement' => $id_logement,
                        ':id_regle' => $regle
                    ));
                    $logger->info("Creation d'une annonce -- TABLE REGLES LOGEMENT OK");
                }else{
                    $logger->alert("Creation d'une annonce -- TABLE REGLES LOGEMENT -- aucun id ne correspond");
                }
            }
            
            //GESTION DES EQUIPEMENTS LOGEMENT
            //On recupere la liste des equipements afin de verifier si un malin n'a pas modifié les valeurs
            //Si oui alors on n'ajoute pas l'equipement
            $query = $db->query("SELECT * FROM `equipements`");
            $data_equipements = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($data_equipements as $data_equipement){
                $list_equipements[] = $data_equipement->id;
            }
            
            foreach($_POST['equipements_logement'] as $equipement){
                if(in_array($equipement, $list_equipements)){
                    $query = 'INSERT INTO `equipement_logement`(`id_logement`, `id_equipement`)
                    VALUES (:id_logement, :id_equipement)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_logement' => $id_logement,
                        ':id_equipement' => $equipement
                    ));
                    $logger->info("Creation d'une annonce -- TABLE EQUIPEMENTS LOGEMENT OK");
                }else{
                    $logger->alert("Creation d'une annonce -- TABLE EQUIPEMENTS LOGEMENT -- aucun id ne correspond");
                }
                
            }
            
            //GESTION DES EQUIPEMENTS DES CHAMBRES
            for ($i=0; $i <= $nb_chambre; $i++) { 
                $indice = $i + 1;
                foreach($_POST['equipements_chambre_'.$indice] as $eqtChambre){
                    if(in_array($eqtChambre, $list_equipements)){
                        $query = 'INSERT INTO `equipement_chambre`(`id_chambre`, `id_equipement`)
                        VALUES (:id_chambre, :id_equipement)';
                        $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                        $sth->execute(array(
                            ':id_chambre' => $list_id_chambre[$i],
                            ':id_equipement' => $eqtChambre
                        ));
                        $logger->info("Creation d'une annonce -- TABLE EQUIPEMENTS CHAMBRE OK");
                    }else{
                        $logger->alert("Creation d'une annonce -- TABLE EQUIPEMENTS CHAMBRE -- aucun id ne correspond");
                    }
                }
            }
            
            $db->commit();
            
            $logger->info("Creation d'une annonce -- FIN DES REQ");
            
            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Annonce créée avec succès </br> Pensez à activer votre annonce");
            header("Location:" . getenv("URL_APP") . "/src/pages/compte" . ucfirst($_SESSION['role']) . ".php");
            exit();
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
            $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce", "Erreur serveur");
            header("Location:" . getenv("URL_APP") . "/src/pages/creationAnnoncePage.php");
            exit();
        }
    }else{
        $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce", "Erreur serveur");
        header("Location:" . getenv("URL_APP") . "/src/pages/creationAnnoncePage.php");
        exit();
    }
}


/*
//Recuperation de la liste des informations de l'utilisateur
//Sans la methode de préparation de requete
//URL: https://zotcoloc.herokuapp.com/user?id=1
$query = $db->query("SELECT 'nom' FROM `utilisateurs` WHERE id = 1");
$data = $query->fetch();

//Attaque injection SQL code
//URL: https://zotcoloc.herokuapp.com/user?id=1;DROP TABLE 'utilisateurs';
$id = $_GET['id'];
$query = $db->query("SELECT 'nom' FROM `utilisateurs` WHERE id = $id");
//====> 
$query = $db->query("SELECT 'nom' FROM `utilisateurs` WHERE id = 1;DROP TABLE 'utilisateurs';");


$query = ("SELECT 'nom' FROM `utilisateurs` WHERE id = :id");
$sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(
    ':id' => $id
));

$sth->execute(array(
    ':id' => "1;DROP TABLE 'utilisateurs';"
));
*/