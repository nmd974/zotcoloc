<?php
require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    try{
        $id_utilisateur = htmlspecialchars($_SESSION['id_utilisateur'], ENT_QUOTES);
        $query = $db->query("SELECT * FROM `utilisateurs` INNER JOIN `proprietaire` ON proprietaire.id_utilisateur = utilisateurs.id WHERE utilisateurs.id = '$id_utilisateur'");
        $mon_compte = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données du compte utilisateur -- SUCCESS");
        $logger->info($mon_compte);

        $query = $db->query("SELECT * FROM `photo_utilisateur` INNER JOIN `photos` ON photos.id = photo_utilisateur.id_photo WHERE photo_utilisateur.id_utilisateur = '$id_utilisateur'");
        $ma_photo = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des photos de l'utilisateur -- SUCCESS");

        $query = $db->query("SELECT * FROM `logements` 
        INNER JOIN `chambres` ON chambres.id_logement = logements.id_logement 
        INNER JOIN `villes` ON villes.id = logements.id_ville
        WHERE `id_utilisateur` = '$id_utilisateur' 
        AND `statut` != 'Suprimee'
        ");
        $mes_annonces = $query->fetchAll(PDO::FETCH_OBJ);
        $logger->info("Recuperation des données des annonces de l'utilisateur -- SUCCESS");

        // $query = $db->query("SELECT * FROM `logements` INNER JOIN `chambres` ON chambres.id_logement = logements.id_logement WHERE `id_utilisateur` = '$id_utilisateur' AND `statut`");
        // $mes_annonces_en_attente_validation = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données des annonces de l'utilisateur -- SUCCESS");

        // $mes_candidatures = [];
        // foreach($mes_annonces as $annonce){
        //     $id_chambre = $annonce->id_chambre;
        //     $query = $db->query("SELECT * FROM `candidater_chambre` WHERE `id_chambre` = '$id_chambre'");
        //     array_push($mes_candidatures, $query->fetch());
        //     $logger->info("Recuperation des données des candidatures aux annonces de l'utilisateur -- SUCCESS");
        // }


        // $id_proprietaire = $mon_compte[0]->id;
        // $query = $pdo->query("SELECT * FROM `candidater_chambre` WHERE `id_particulier` = '$id_proprietaire'");
        // $mes_candidatures = $query->fetchAll(PDO::FETCH_OBJ);
        // $logger->info("Recuperation des données des regles -- SUCCESS");
        
        $logger->info("Recuperation des données -- FIN DES REQ");
        
    }catch(PDOException $e){
        $error = $e->getMessage();
        $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
    }
}else{
    $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
}
