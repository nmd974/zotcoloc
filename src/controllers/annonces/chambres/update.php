<?php
require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');
// TODO : Modifier la localisation du dossier imageControl dans le dossier libs
require_once(__ROOT__.'/src/controllers/imageControl.php');
use \Waavi\Sanitizer\Sanitizer;

$error = null;
if($_POST['id_chambre']){
    $id_chambre = htmlspecialchars($_POST['id_chambre'], ENT_QUOTES);
    //Validation des données cote serveur + securite specialchars
    $inputRequired = ['titre_chambre', 'description_chambre'];
    foreach($inputRequired as $value){
        if($_POST["$value"] == ""){
            $error = true;
            $logger->info("Modification d'une chambre -- VERIF INPUT NOK");
            $_SESSION['flash'] = array('Error', "Echec de la modification de la chambre </br> Veuillez vérifier les champs");
            header("Location: http://127.0.0.1:8000/src/pages/editAnnoncePage.php?id=$id_chambre");
        }
    }
        
    $logger->info("Modification d'une chambre -- VERIF SERVEUR OK");
    if($error == null) {
        //Coup de sanytol sur les données des formulaires
        
        $data = [
            'titre_chambre' => $_POST['titre_chambre'],
            'description_chambre' => $_POST['description_chambre'],
            'surface_chambre' => $_POST['surface_chambre'],
            'type_chambre' => $_POST['type_chambre'],
            'a_louer' => $_POST['a_louer'],
            'duree_bail' => $_POST['duree_bail'],
            'loyer' => $_POST['loyer'],
            'charges' => $_POST['charges'],
            'caution' => $_POST['caution'],
            'frais_dossier' => $_POST['frais_dossier'],
            'date_disponibilite' => $_POST['date_disponibilite']
        ];
        
        $customFilter = [
            'htmlspecialchars' => function($value, $options = []){
                return htmlspecialchars($value, ENT_QUOTES);
            }
        ];
        
        $filters = [
            'titre_chambre' => 'trim|escape|capitalize|htmlspecialchars',
            'description_chambre' => 'trim|escape|capitalize|htmlspecialchars',
            'surface_chambre' => 'trim|escape|capitalize|htmlspecialchars',
            'type_chambre' => 'trim|escape|capitalize|htmlspecialchars',
            'a_louer' => 'trim|escape|htmlspecialchars|digit',
            'duree_bail' => 'trim|digit|htmlspecialchars',
            'loyer' => 'trim|digit|htmlspecialchars',
            'charges' => 'trim|digit|htmlspecialchars',
            'caution' => 'trim|digit|htmlspecialchars',
            'frais_dossier' => 'trim|digit|htmlspecialchars',
            'date_disponibilite' => 'trim|format_date:Y-m-d, Y-m-d'
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
        $logger->info("Modification d'une chambre -- SANITIZE OK");
        
        //Connexion à la BDD
        $db = Connection::getPDO();
        if($db){
            try{
                $db->beginTransaction();
                
                //AJOUT TABLE chambreS
                $query = 'UPDATE `chambres` SET `titre_chambre` = :titre_chambre,
                `description_chambre` = :description_chambre,
                `surface_chambre` = :surface_chambre, 
                `type_chambre` = :type_chambre,
                `a_louer` = :a_louer, 
                `duree_bail` = :duree_bail, 
                `loyer` = :loyer, 
                `charges` = :charges, 
                `caution` = :caution,
                `frais_dossier` = :frais_dossier,
                `date_disponibilite` = :date_disponibilite
                WHERE `id_chambre` = :id_chambre';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_chambre' => $id_chambre,
                    ':titre_chambre' => $data_sanitized['titre_chambre'],
                    ':description_chambre' => $data_sanitized['description_chambre'],
                    ':type_chambre' => $data_sanitized['type_chambre'],
                    ':surface_chambre' => $data_sanitized['surface_chambre'],
                    ':a_louer' => $data_sanitized['a_louer'],
                    ':duree_bail' => $data_sanitized['duree_bail'],
                    ':loyer' => $data_sanitized['loyer'],
                    ':charges' => $data_sanitized['charges'],
                    ':caution' => $data_sanitized['caution'],
                    ':frais_dossier' => $data_sanitized['frais_dossier'],
                    ':date_disponibilite' => $data_sanitized['date_disponibilite']
                ));
                $logger->info("Modification d'une chambre -- TABLE chambre OK");
                                
                //GESTION DES EQUIPEMENTS chambre
                $query = 'DELETE FROM `equipement_chambre` WHERE id_chambre = :id_chambre';
                $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $sth->execute(array(
                    ':id_chambre' => $id_chambre,
                ));
                $logger->info("Modification d'unee chambre -- TABLE REGLES chambre OK");
                foreach($_POST['equipements_chambre'] as $equipement){
                    $query = 'INSERT INTO `equipement_chambre`(`id_chambre`, `id_equipement`)
                    VALUES (:id_chambre, :id_equipement)';
                    $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                    $sth->execute(array(
                        ':id_chambre' => $id_chambre,
                        ':id_equipement' => $equipement
                    ));
                    $logger->info("Modification d'une chambre -- TABLE EQUIPEMENTS chambre OK");
                }
                
                $db->commit();
                
                $logger->info("Modification d'une chambre -- FIN DES REQ");
                
                // On complete les valeurs pour session
                $_SESSION['flash'] = array('Success', "Chambre modifiée avec succès");
                header('Location: http://127.0.0.1:8000/src/pages/compteProprietaire.php');
            }catch(PDOException $e){
                $error = $e->getMessage();
                $db->rollBack();
                $logger->error("Echec de la modification de la chambre -- $error");
                // http_response_code(400);
                $_SESSION['flash'] = array('Error', "Echec de la modification de la chambre", "Erreur serveur");
                header("Location: http://127.0.0.1:8000/src/pages/editAnnoncePage.php?id=$id_chambre");
                // echo "Echec de la modification de la chambre </br> $error";
            }
        }else{
            $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
            // http_response_code(503);
            $_SESSION['flash'] = array('Error', "Echec de la modification de la chambre", "Erreur serveur");
            header("Location: http://127.0.0.1:8000/src/pages/editAnnoncePage.php?id=$id_chambre");
            echo '<div class="alert alert-danger" id="error_msg">Echec lors de l\'inscription </br> Impossible de se connecter à la base de données</div>';
        }
    }
}
