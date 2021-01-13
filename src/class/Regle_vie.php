<?php

class regles {

    public static $list_regles =[];

    public static function regle_vie()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
                FROM `regles` 
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