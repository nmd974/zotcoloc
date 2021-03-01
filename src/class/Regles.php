<?php
require_once(__DIR__ . '/Connection.php');
class Regles {


    public static function reglesAll()
    {
        $pdo = Connection::getPDO();
        try{
            $query = $pdo->query("SELECT * FROM `regles` ORDER BY `regles`.`libelle_regle` ASC");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function reglesByIdLogement($id)
    {
        $error = null;
        try{
            $query = $pdo->query("SELECT id 
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


}