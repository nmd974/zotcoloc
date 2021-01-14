<?php

class TopVilles {

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

     
    
}
