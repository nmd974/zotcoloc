<?php

class Recherches {


    public static function recherche_annonce($search)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.id
            WHERE `statut` = 'Publiee'
            AND `a_louer` = 1 
            AND `libelle_ville`LIKE '%$search%'
            ORDER BY `date_creation` DESC;
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function image_room()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
            FROM 
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
     
    public static function annonce_details()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.id
            
            
            
            
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    } 
}
