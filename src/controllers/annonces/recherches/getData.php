<?php

require_once(__ROOT__ . '/src/class/Connection.php');
require_once(__ROOT__ . '/src/libs/gestionLogs.php');

$error = null;

//Connexion à la BDD
$db = Connection::getPDO();
if($db){
    if(!isset($_GET["search_room"])){
        try{
            
            //all annonce ok
            $query = $db->query("SELECT * 
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.role_id
            WHERE `statut` = 'Publiee'
            AND `a_louer` = 1
            AND `statut_chambre` = 'Active'
            ORDER BY `date_creation` DESC;
            ");
            $annonces = $query->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Recuperation des données des villes -- SUCCESS");
            
            //count annonce ok
            $query = $db->query("SELECT COUNT(*) as nb_rslt
            FROM `logements` 
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id         
            WHERE `statut` = 'Publiee'
            AND `a_louer` = 1 
            AND `statut_chambre` = 'Active'
            ");
            $count = $query->fetch();
            $logger->info("Recuperation des données des regles -- SUCCESS");
            
            //list ville ok
            $query = $db->query("SELECT libelle_ville
            FROM villes 
            ");
            $liste_villes = $query->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Recuperation des données des villes -- SUCCESS");
            
            $logger->info("Recuperation des données -- FIN DES REQ");
            
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
            exit();
        }
    }else{
        try{
            $search=htmlspecialchars($_GET["search_room"], ENT_QUOTES);
            //recherche annonces
            $query = $db->query("SELECT * 
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.role_id
            WHERE `statut` = 'Publiee'
            AND `a_louer` = 1 
            AND `statut_chambre` = 'Active'
            AND `libelle_ville`LIKE '$search%'
            ORDER BY `date_creation` DESC;
            ");
            $annonces = $query->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Recuperation des données des equipements -- SUCCESS");
            
            //nombre annonce
            $query = $db->query("SELECT COUNT(*) as nb_rslt
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.role_id
            WHERE `statut` = 'Publiee'
            AND `a_louer` = 1 
            AND `statut_chambre` = 'Active'
            AND `libelle_ville`LIKE '%$search%'
            ");
            $count = $query->fetch();
            $logger->info("Recuperation des données des regles -- SUCCESS");
            
                        
            //list ville ok
            $query = $db->query("SELECT libelle_ville
            FROM villes 
            ");
            $liste_villes = $query->fetchAll(PDO::FETCH_OBJ);
            $logger->info("Recuperation des données des villes -- SUCCESS");
            
            $logger->info("Recuperation des données -- FIN DES REQ");
            
        }catch(PDOException $e){
            $error = $e->getMessage();
            $logger->error("Echec de la Creation d'une annonce (proprietaire) -- $error");
            exit();
        }
    }
    
}else{
    $logger->alert("Echec lors de l\'inscription -- Impossible de se connecter à la base de données");
    exit();
}
