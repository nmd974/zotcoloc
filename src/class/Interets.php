<?php
include __DIR__ . '/Connection.php';
class Interets {

    public static $liste_interets =[];

    public static function habitudes_alimentaires()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * 
                FROM `interets` 
                INNER JOIN `categorie_interet` ON interets.id_categorie = categorie_interet.id 
                WHERE `libelle_categorie` = 'habitudes alimentaires' 
                ORDER BY `interets`.`id_interet` ASC
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function centres_interets()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * 
                FROM `interets` 
                INNER JOIN `categorie_interet` ON interets.id_categorie = categorie_interet.id 
                WHERE `libelle_categorie` = 'centres d\'interets' 
                ORDER BY `interets`.`id_interet` ASC
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function personnalite()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * 
                FROM `interets` 
                INNER JOIN `categorie_interet` ON interets.id_categorie = categorie_interet.id 
                WHERE `libelle_categorie` = 'personnalite' 
                ORDER BY `interets`.`id_interet` ASC
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function style_vie()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * 
                FROM `interets` 
                INNER JOIN `categorie_interet` ON interets.id_categorie = categorie_interet.id 
                WHERE `libelle_categorie` = 'style de vie' 
                ORDER BY `interets`.`id_interet` ASC
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
    
    public static function interetsByParticulierId($id)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT `id_interet` FROM `interet_particulier` 
            WHERE id_particulier = '$id'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function deleteInterets($id_particulier, $id_interet)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("DELETE FROM `interet_particulier` WHERE `id_particulier` = '$id_particulier' AND `id_interet` = $id_interet
            ");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

}