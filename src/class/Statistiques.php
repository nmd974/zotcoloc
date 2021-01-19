<?php

class Statistiques {

 
    /* function pour rechercher les anonnces totales de aplly*/
    public static function annonce_total()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("
               SELECT COUNT(*)
                FROM chambres
                WHERE a_louer = 1
            ");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    /*function pour rechercher les ainscriptions totales de aplly  */
    public static function inscription_total()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("
               SELECT COUNT(*)
                FROM utilisateurs 
            ");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    /*function pour calculer les top 3 plus annonces par ville  */
    public static $top_villes =[];

    public static function top_ville()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    /*function pour calculer nombre annonces totales par region de aplly  */
    public static $region =[];

    public static function stat_region()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT `libelle_zone`, COUNT(*) AS 'nb'
            FROM `logements` 
            INNER JOIN `villes` 
            ON logements.id_ville = villes.id 
            INNER JOIN `communes` 
            ON villes.id_commune = communes.id 
            INNER JOIN `zone` 
            ON communes.id_zone = zone.id 
            WHERE `statut` = 'Publiee' 
            GROUP BY `libelle_zone`;
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }


}
