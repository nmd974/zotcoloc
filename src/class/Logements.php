<?php
require_once(__DIR__ . '/Connection.php');
class Logements {

    public static function idLogementByIdChambre($id)
    {
        $pdo = Connection::getPDO();
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
        $pdo = Connection::getPDO();
        $error = null;
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