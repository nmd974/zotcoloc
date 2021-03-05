<?php
require_once(__DIR__ . '/Connection.php');
class Statistiques {

 
    /* function pour rechercher les anonnces totales de aplly*/
    public static function annonce_total()
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("
               SELECT COUNT(*)
                FROM chambres
                WHERE a_louer = 1
                AND statut_chambre = 'Active'
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
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("
               SELECT COUNT(*)
                FROM utilisateurs 
                WHERE id_role != 5
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
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT `libelle_ville`, COUNT(*)
                FROM `logements` 
                INNER JOIN `villes` ON logements.id_ville = villes.id
                INNER JOIN `chambres` ON chambres.id_logement = logements.id_logement
                WHERE statut = 'Publiee' 
                AND statut_chambre = 'Active' 
                AND a_louer = 1
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
        $pdo = Connection::getPDO();
        $error = null;
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
