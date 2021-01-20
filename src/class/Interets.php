<?php

class Interets {

    public static $liste_interets =[];

    public static function habitudes_alimentaires()
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

    public static function centres_interets()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    public static function ajoutInteretsParticulier($id_particulier, $id_interet)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `interet_particulier`(`id_particulier`, `id_interet`) 
                VALUES ('$id_particulier','$id_interet')
            ");
            // $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    
    public static function interetsByParticulierId($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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