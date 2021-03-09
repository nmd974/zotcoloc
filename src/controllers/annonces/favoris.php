<?php

// require_once(dirname(dirname(dirname(__DIR__))).'/libs/session/session.php');
// if(!$_SESSION['isLoggedIn']){
//     $_SESSION['flash'] = array('Error', "Echec de l'opération");
//     header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
//     $logger->alert("Mise en favoris -- PAS CONNECTE");
//     exit();
// }
// require_once(__ROOT__ . '/src/class/Connection.php');
// require_once(__ROOT__ . '/src/libs/gestionLogs.php');

// $error = null;

// if(isset($_POST['id_chambre']) && isset($_SESSION['id_utilisateur'])){
//     $db = Connection::getPDO();
//     $id_chambre = htmlspecialchars($_POST['id_chambre'], ENT_QUOTES);
//     if($db){
//         //Lancement des requetes
//         try{
//             $db->beginTransaction();

//             $query = 'INSERT INTO favoriser_logement (id_chambre, id_utilisateur) VALUES(:id_chambre, :id_utilisateur)';
//             $sth = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
//             $sth->execute(array(
//                 ':id_chambre' => $id_chambre,
//                 ':id_utilisateur' => $id_utilisateur
//             ));

//             $db->commit();
//             $logger->info("Mise en favoris -- FIN SUCCESS");
//             echo "Success";
//         }catch(PDOException $e){
//             $error = $e->getMessage();
//             $db->rollBack();
//             $logger->error("Echec lors de la mise en favoris d'un annonce proprietaire -- $error");
//             echo "Error";
//         }
//     }else{
//         $logger->alert("Echec lors de la mise en favoris d'un annonce -- Impossible de se connecter à la bdd");
//         echo "Error";
//     }
// }else{
//     $logger->alert("Echec lors de la mise en favoris d'un annonce -- Paramètres incorrects");
//     echo "Error";
// }
