<?php

class Equipements2 {

    public static $liste_equipements =[];

    public static function equipement_prive()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
}