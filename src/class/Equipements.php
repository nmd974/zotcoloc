<?php
require_once(__DIR__ . '/Connection.php');
class Equipements {

    public static function equipementAll()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * FROM `equipements` ORDER BY `equipements`.`libelle_equipement` ASC");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    
    public static function equipementsByIdLogement($id)
    {
        $pdo = Connection::getPDO();
        try{
            $query = $pdo->query("SELECT id
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

    public static function equipementsByIdChambre($id)
    {
        $error = null;
        try{
            $query = $pdo->query("SELECT id
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
}