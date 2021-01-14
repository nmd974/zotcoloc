<?php

class Logements {

    public static function createLogement($id_logement, $id_profil, $id_ville, $id_utilisateur, $titre_logement, $description_logement, $surface_logement, $meuble, $eligible_aides, $candidature_facile, $age_max, $age_min, $date_creation)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `logements`(`id_logement`, `id_profil`, `id_ville`, `id_utilisateur`, `titre_logement`, `description_logement`, `surface_logement`, `meuble`, `eligible_aides`, `candidature_facile`, `age_max`, `age_min`, `date_creation`, `statut`) 
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
                '$date_creation', 
                'Publiee')
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
}