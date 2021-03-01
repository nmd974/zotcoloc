<?php
require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');

require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
// TODO : Modifier la localisation du dossier imageControl dans le dossier libs
require_once(__ROOT__.'/src/controllers/imageControl.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
if($_POST['id_logement']){
    $id_logement = htmlspecialchars($_POST['id_logement'], ENT_QUOTES);
    $id_chambre = htmlspecialchars($_POST['id_chambre'], ENT_QUOTES);
    //Validation des données cote serveur + securite specialchars
    $inputRequired = ['titre_logement', 'description_logement', 'ville'];
    foreach($inputRequired as $value){
        if($_POST["$value"] == ""){
            $error = true;
            $logger->info("Modification d'un logement -- VERIF INPUT NOK");
            $_SESSION['flash'] = array('Error', "Echec de la modification du logement </br> Veuillez vérifier les champs");
            header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
        }
    }
    
    //On met à 0 de base si pas selectionne
    if(!isset($_POST['aides_logement'])){
        $_POST['aides_logement'] = 0;
    };
    
    $logger->info("Modification d'un logement -- VERIF SERVEUR OK");
    if($error == null) {
        //Coup de sanytol sur les données des formulaires
        
        $data = [
            'titre_logement' => $_POST['titre_logement'],
            'description_logement' => $_POST['description_logement'],
            'type_logement' => $_POST['type_logement'],
            'ville' => $_POST['ville'],
            'surface_logement' => $_POST['surface_logement'],
            'age_max' => $_POST['age_max'],
            'age_min' => $_POST['age_min'],
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
            'age_max' => 'digit|htmlspecialchars',
            'age_min' => 'digit|htmlspecialchars'
        ];
        
        $sanitizer = new Sanitizer($data, $filters,  $customFilter);
        $data_sanitized = $sanitizer->sanitize();
        foreach($data_sanitized as $value){
            $logger->info($value);
        }
        foreach($_POST as $value){
            $logger->info("POST $value");
        }
        // TODO : Faille via les id en input mettre en sanitize
        $logger->info("Modification d'un logement -- SANITIZE OK");
        
        //Connexion à la BDD
        $db = Connection::getPDO();
        if($db){
            try{
                $db->beginTransaction();
                
                //AJOUT TABLE LOGEMENTS
                $query = 'UPDATE `logements` SET `id_profil` = :id_profil,
                `id_ville` = :id_ville,
                `titre_logement` = :titre_logement, 
                `description_logement` = :description_logement, 
                `surface_logement` = :surface_logement, 
                `meuble` = :meuble, 
                `eligible_aides` = :eligible_aides, 
                `age_max` = :age_max, 
                `age_min` = :age_min, 
                `type_logement` = :type_logement 
                WHERE `id_logement` = :id_logement';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_logement' => $id_logement,
                    ':id_profil' => $_POST['profil'],
                    ':id_ville' => $data_sanitized['ville'],
                    ':titre_logement' => $data_sanitized['titre_logement'],
                    ':description_logement' => $data_sanitized['description_logement'],
                    ':surface_logement' => $data_sanitized['surface_logement'],
                    ':meuble' => $_POST['meuble'],
                    ':eligible_aides' => $_POST['aides_logement'],
                    ':age_max' => $data_sanitized['age_max'],
                    ':age_min' => $data_sanitized['age_min'],
                    ':type_logement' => $data_sanitized['type_logement'],
                    
                ));
                $logger->info("Modification d'un logement -- TABLE LOGEMENT OK");
                
                
                //GESTION DES REGLES LOGEMENT
                //On delete les ancienne regles puis on ajoute
                $query = 'DELETE FROM `regle_logement` WHERE id_logement = :id_logement';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_logement' => $id_logement,
                ));
                $logger->info("Modification d'un logement -- TABLE REGLES LOGEMENT SUPPRESSION OK");
                foreach($_POST['regles'] as $regle){
                    $query = 'INSERT INTO `regle_logement`(`id_logement`, `id_regle`)
                    VALUES (:id_logement, :id_regle)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_logement' => $id_logement,
                        ':id_regle' => $regle
                    ));
                    $logger->info("Modification d'un logement -- TABLE REGLES LOGEMENT OK");
                }
                
                //GESTION DES EQUIPEMENTS LOGEMENT
                $query = 'DELETE FROM `equipement_logement` WHERE id_logement = :id_logement';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_logement' => $id_logement,
                ));
                $logger->info("Modification d'un logement -- TABLE REGLES SUPPRESSION LOGEMENT OK");
                foreach($_POST['equipements_logement'] as $equipement){
                    $query = 'INSERT INTO `equipement_logement`(`id_logement`, `id_equipement`)
                    VALUES (:id_logement, :id_equipement)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_logement' => $id_logement,
                        ':id_equipement' => $equipement
                    ));
                    $logger->info("Modification d'un logement -- TABLE EQUIPEMENTS LOGEMENT OK");
                }
                
                $db->commit();
                
                $logger->info("Modification d'un logement -- FIN DES REQ");
                
                // On complete les valeurs pour session
                $_SESSION['flash'] = array('Success', "Logement modifié avec succès");
                header('Location:" . getenv("URL_APP") . "/src/pages/compteProprietaire.php');
            }catch(PDOException $e){
                $error = $e->getMessage();
                $db->rollBack();
                $logger->error("Echec de la modification du logement -- $error");
                // http_response_code(400);
                $_SESSION['flash'] = array('Error', "Echec de la modification du logement", "Erreur serveur");
                header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
                // echo "Echec de la modification du logement </br> $error";
            }
        }else{
            $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
            // http_response_code(503);
            $_SESSION['flash'] = array('Error', "Echec de la modification du logement", "Erreur serveur");
            header("Location:" . getenv("URL_APP") . "/src/pages/editAnnoncePage.php?id=$id_chambre");
            echo '<div class="alert alert-danger" id="error_msg">Echec lors de l\'inscription </br> Impossible de se connecter à la base de données</div>';
        }
    }
}
