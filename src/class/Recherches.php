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
            AND `libelle_ville`LIKE '$search%'
            ORDER BY `date_creation` DESC;
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function all_annonce()
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
            ORDER BY `date_creation` DESC;
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function count_annonce()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT COUNT(*)
            FROM `logements` 

            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
           
            WHERE `statut` = 'Publiee'
            
            
 
            ");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
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
     
    public static function annonce_details($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
            FROM `chambres` 
            INNER JOIN `logements` ON logements.id_logement = chambres.id_logement
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id

            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.id
            INNER JOIN `proprietaire` ON utilisateurs.id=proprietaire.id_utilisateur
            WHERE chambres.id_chambre = '$id'
            -- SELECT * 
            -- FROM `chambres` 
            -- INNER JOIN `logements` ON logements.id_logement = chambres.id_logement
            -- INNER JOIN `villes` ON logements.id_ville = villes.id 
            -- INNER JOIN `communes` ON villes.id_commune = communes.id
            -- INNER JOIN `proprietaire` ON utilisateurs.id=proprietaire.id_utilisateur
            
            -- INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            -- INNER JOIN `roles` ON utilisateurs.id_role = roles.id
            -- WHERE chambres.id_chambre = '$id'
            

            ");
            $data = $query->fetch(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    } 

    public static function nombre_annonce($search)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT COUNT(*)
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilisateur = utilisateurs.id
            INNER JOIN `roles` ON utilisateurs.id_role = roles.id
            WHERE `statut` = 'Publiee'
            AND `a_louer` = 1 
            AND `libelle_ville`LIKE '%$search%'
            
 
            ");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function photo_annonce($idChambre)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT libelle_photo 
            FROM photo_chambre
            INNER JOIN photos ON photos.id = photo_chambre.id_photo
            INNER JOIN chambres ON chambres.id_chambre = photo_chambre.id_chambre
            WHERE photo_chambre.id_chambre = '$idChambre'
            
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function photo_utilisateur($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
            FROM photo_utilisateur 
            INNER JOIN photos ON photos.id = photo_utilisateur.id_photo
            WHERE photo_utilisateur.id_utilisateur = '$id'
           
            
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function annonceByUserId($id)
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
            WHERE logements.id_utilisateur = '$id'
            ORDER BY `date_creation` DESC;
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function regleByRoomId($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT libelle_regle 
            FROM regles
            INNER JOIN regle_logement ON regle_logement.id_regle = regles.id
            WHERE regle_logement.id_logement = '$id'
            
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function equipementLogement($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT libelle_equipement 
            FROM equipements
            INNER JOIN equipement_logement ON equipement_logement.id_equipement = equipements.id
            WHERE equipement_logement.id_logement = '$id'
            
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function equipementChambre($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT libelle_equipement 
            FROM equipements
            INNER JOIN equipement_chambre ON equipement_chambre.id_equipement = equipements.id
            WHERE equipement_chambre.id_chambre = '$id'
            
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function photoLogementById($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT libelle_photo 
            FROM photos
            INNER JOIN photo_logement ON photo_logement.id_photo = photos.id
            WHERE photo_logement.id_logement = '$id'
            
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

public static function listVille()
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
    $error = null;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $query = $pdo->query("SELECT libelle_ville
            FROM villes 
           
            ");
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return array(true, $data);
    }catch(PDOException $e){
        $error = $e->getMessage();
        return array(false, $error);
    }
}
}