<?php

class Annonces {

 

    public static function annonce_total()
    {
        $pdo = new PDO('mysql:host=lebondzotcoloc.mysql.db;dbname=lebondzotcoloc;charset=utf8', 'lebondzotcoloc', 'Satanus1234');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("
               SELECT COUNT(*)
                FROM logements 
            ");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }


}