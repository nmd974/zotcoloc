<?php
require_once(__DIR__ . '/Connection.php');
class Villes {

    public static function villesAll()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * 
                FROM `villes` 
                ORDER BY `villes`.`libelle_ville` ASC
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function ajoutVilleParticulier($id, $id_ville)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("INSERT INTO `ville_particulier`(`particulier_id`, `ville_id`) 
                VALUES ('$id', '$id_ville')
            ");
            return array(true, $query);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

   

    public static function top_ville()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT `libelle_ville`, COUNT(*)
                FROM `logements` 
                INNER JOIN `villes` 
                WHERE logements.id_ville = villes.id AND statut = 'Publiee'  
                GROUP BY `libelle_ville` 
                ORDER BY COUNT(*) DESC LIMIT 3
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

}