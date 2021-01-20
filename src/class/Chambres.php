<?php

class Chambres {

    public static function createChambre($id_chambre, $id_logement, $titre_chambre, $description_chambre, $surface_chambre, $type_chambre, $a_louer, $date_disponibilite, $duree_bail, $loyer, $charges, $caution, $frais_dossier)
    {
        $pdo = new PDO('mysql:host=lebondzotcoloc.mysql.db;dbname=lebondzotcoloc;charset=utf8', 'lebondzotcoloc', 'Satanus1234');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `chambres`(`id_chambre`, `id_logement`, `titre_chambre`, `description_chambre`, `surface_chambre`, `type_chambre`, `a_louer`, `date_disponibilite`, `duree_bail`, `loyer`, `charges`, `caution`, `frais_dossier`) 
            VALUES (
                '$id_chambre',  
                '$id_logement', 
                '$titre_chambre', 
                '$description_chambre', 
                '$surface_chambre', 
                '$type_chambre', 
                '$a_louer', 
                '$date_disponibilite', 
                '$duree_bail', 
                '$loyer', 
                '$charges', 
                '$caution', 
                '$frais_dossier')
            ");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

        
    public static function chambreById($id)
    {
        $pdo = new PDO('mysql:host=lebondzotcoloc.mysql.db;dbname=lebondzotcoloc;charset=utf8', 'lebondzotcoloc', 'Satanus1234');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `chambres` 
            WHERE chambres.id_chambre = '$id'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
}