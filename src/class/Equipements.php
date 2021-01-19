<?php

class Equipements {

    public static function equipementAll()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `equipements` ORDER BY `equipements`.`libelle_equipement` ASC");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function equipementLogement($id_logement, $id_equipement)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `equipement_logement`(`id_logement`, `id_equipement`, `selectionne`) VALUES ('$id_logement','$id_equipement',1)");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function equipementChambre($id_chambre, $id_equipement)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `equipement_chambre`(`id_chambre`, `id_equipement`, `selectionne`) VALUES ('$id_chambre','$id_equipement',1)");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function equipementsByIdLogement($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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