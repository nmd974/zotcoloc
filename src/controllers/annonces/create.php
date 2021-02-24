<?php

/*
LOGEMENT :

titre_logement
description_logement
type_logement
ville
surface_logement
age_max
age_min
aides_logement
profil
meuble

CHAMBRE :
titre_chambre
description_chambre
surface_chambre_
type_chambre_
date_disponibilite
duree_bail
loyer
charge
caution
frais_dossier
a_louer_


 */


require_once(dirname(dirname(__DIR__)).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
// TODO : Modifier la localisation du dossier imageControl dans le dossier libs
require_once(__ROOT__.'/src/controllers/imageControl.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;

//Validation des données cote serveur + securite specialchars
$inputRequired = ['titre_logement', 'description_logement', 'ville', 'titre_chambre', 'description_chambre'];
foreach($inputRequired as $value){
    if($_POST["$value"] == ""){
        $error = true;
        $logger->info("Creation d'une annonce -- VERIF INPUT NOK");
        $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce </br> Veuillez vérifier les champs");
        header('Location: http://127.0.0.1:8000/src/pages/creationAnnoncePage.php');
        // return '<div class="alert alert-danger" id="error_msg">Erreur dans le formulaire </br> Veuillez vérifier les champs</div>';
    }
}

//On met à 0 de base si pas selectionne
if(!isset($_POST['aides_logement'])){
    $_POST['aides_logement'] = 0;
};

$logger->info("Creation d'une annonce -- VERIF SERVEUR OK");
if($error == null) {
    //Coup de sanytol sur les données des formulaires

    $data = [
        'titre_logement' => $_POST['titre_logement'],
        'description_logement' => $_POST['description_logement'],
        'type_logement' => $_POST['type_logement'],
        'ville' => $_POST['ville'],
        'surface_logement' => $_POST['surface_logement'],
        'age_max' => $_POST['age_max'],
        'age_min' => $_POST['age_min']
    ];
    
    $customFilter = [
        'htmlspecialchars' => function($value, $options = []){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    ];
    
    $filters = [
        'titre_logement' => 'trim|escape|capitalize|htmlspecialchars',
        'description_logement' => 'trim|escape|capitalize|htmlspecialchars',
        'type_logement' => 'trim|escape|capitalize|htmlspecialchars',
        'ville' => 'trim|escape|capitalize|htmlspecialchars',
        'surface_logement' => 'trim|escape|capitalize|htmlspecialchars|digit',
        'telephone' => 'digit|htmlspecialchars',
        'age_max' => 'digit|htmlspecialchars',
        'age_min' => 'digit|htmlspecialchars'
    ];
    
    $sanitizer = new Sanitizer($data, $filters,  $customFilter);
    $data_sanitized = $sanitizer->sanitize();
// TODO : Faille via les id en input mettre en sanitize
    $logger->info("Creation d'une annonce -- SANITIZE OK");

    //Connexion à la BDD
    $db = Connection::getPDO();
    if($db){
        $id_logement = md5(uniqid(rand(), true));
        $id = md5(uniqid(rand(), true));
        try{
            $db->beginTransaction();
            
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

                //On sanytol les données
                $data = [
                    'titre_chambre' => $_POST['titre_chambre'][$i],
                    'description_chambre' => $_POST['description_chambre'][$i],
                    'surface_chambre' => $_POST['surface_chambre_'.$indice],
                    'type_chambre' => $_POST['type_chambre_'.$indice],
                    'date_disponibilite' => $_POST['date_disponibilite'][$i],
                    'duree_bail' => $_POST['duree_bail'][$i],
                    'loyer' => $_POST['loyer'][$i],
                    'charge' => $_POST['charge'][$i],
                    'caution' => $_POST['caution'][$i],
                    'frais_dossier' => $_POST['frais_dossier'][$i],
                    'a_louer' => $_POST['a_louer_'.$indice]

                ];
                $logger->info($_POST['a_louer_'.$indice]);
                $filters = [
                    'titre_chambre' => 'trim|escape|capitalize|htmlspecialchars',
                    'description_chambre' => 'trim|escape|capitalize|htmlspecialchars',
                    'surface_chambre' => 'trim|escape|htmlspecialchars|digit',
                    'type_chambre' => 'trim|escape|htmlspecialchars|digit',
                    'date_disponibilite' => 'trim|format_date:Y-m-d, Y-m-d|htmlspecialchars',
                    'duree_bail' => 'trim|escape|digit|htmlspecialchars',
                    'loyer' => 'trim|escape|digit|htmlspecialchars',
                    'charge' => 'trim|escape|digit|htmlspecialchars',
                    'caution' => 'trim|escape|digit|htmlspecialchars',
                    'frais_dossier' => 'trim|escape|digit|htmlspecialchars',
                    'a_louer' => 'trim|escape|digit|htmlspecialchars',
                ];

                $sanitizer = new Sanitizer($data, $filters,  $customFilter);
                $data_sanitized = $sanitizer->sanitize();
            
                //AJOUT TABLE PROPRIETAIRE
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
                    ':caution' => $data_sanitized['surface_chambre'],
                    ':frais_dossier' => $data_sanitized['frais_dossier']
                ));
                $logger->info("Creation d'une annonce -- TABLE CHAMBRE OK");
            }
           
            //GESTION DES PHOTOS DU LOGEMENT
            $indice_nb_photo = count($_FILES['photos_logement']['name']);
            for ($i=0; $i < $indice_nb_photo; $i++) { 
                $ajoutImage = controleImageArray($_FILES['photos_logement'], $i);
                if($ajoutImage[0]){ //La fonction retourne true si erreur
                    // $message = "Erreur lors de l'ajout de la photo";
                    // $validationFormulaire = false;
                    // return array(false, $message);
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
            $nb_chambre = count($_POST['titre_chambre']);
            $indice = $i + 1;
            for ($i=0; $i < $nb_chambre; $i++) { 
                $indice = $i + 1;
                $indice_nb_photo = count($_FILES['photos_chambre_'.$indice]['name']);
                for ($i=0; $i < $indice_nb_photo; $i++) { 
                    $ajoutImage = controleImageArray($_FILES['photos_chambre_'.$indice], $i);
                    if($ajoutImage[0]){ //La fonction retourne true si erreur
                        // $message = "Erreur lors de l'ajout de la photo";
                        // $validationFormulaire = false;
                        // return array(false, $message);
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
                            ':id_chambre' => $list_id_chambre[$i],
                            ':id_photo' => $id_photo
                        ));
                        $logger->info("Creation d'une annonce -- TABLE PHOTO CHAMBRE OK");
                    }
                }
            }

            $db->commit();

            $logger->info("Creation d'une annonce -- FIN DES REQ");

            // On complete les valeurs pour session
            $_SESSION['flash'] = array('Success', "Annonce créée avec succès </br> Pensez à activer votre annonce");
            header('Location: http://127.0.0.1:8000/src/pages/compteProprietaire.php');
        }catch(PDOException $e){
            $error = $e->getMessage();
            $db->rollBack();
            $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
            // http_response_code(400);
            $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce", "Erreur serveur");
            header('Location: http://127.0.0.1:8000/src/pages/creationAnnoncePage.php');
            // echo "Echec lors de la creation de l'annonce </br> $error";
        }
    }else{
        $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
        // http_response_code(503);
        $_SESSION['flash'] = array('Error', "Echec lors de la creation de l'annonce", "Erreur serveur");
        header('Location: http://127.0.0.1:8000/src/pages/creationAnnoncePage.php');
        echo '<div class="alert alert-danger" id="error_msg">Echec lors de l\'inscription </br> Impossible de se connecter à la base de données</div>';
    }
}