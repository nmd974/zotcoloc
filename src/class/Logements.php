<?php

class Logements {

    public static function createLogement($id_logement, $id_profil, $id_ville, $id_utilisateur, $titre_logement, $description_logement, $surface_logement, $meuble, $eligible_aides, $candidature_facile, $age_max, $age_min, $type_logement)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `logements`(`id_logement`, `id_profil`, `id_ville`, `id_utilisateur`, `titre_logement`, `description_logement`, `surface_logement`, `meuble`, `eligible_aides`, `candidature_facile`, `age_max`, `age_min`, `statut`, `type_logement`) 
            VALUES (
                '$id_logement',  
                '$id_profil', 
                '$id_ville', 
                '$id_utilisateur', 
                '$titre_logement', 
                '$description_logement', 
                '$surface_logement', 
                '$meuble', 
                '$eligible_aides', 
                '$candidature_facile', 
                '$age_max', 
                '$age_min', 
                'Publiee',
                '$type_logement')
            ");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function idLogementByIdChambre($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT `id_logement` FROM `chambres` 
            WHERE chambres.id_chambre = '$id'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    
    public static function logementByIdLogement($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `logements` 
            WHERE logements.id_logement = '$id'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
}