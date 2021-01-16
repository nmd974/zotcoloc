<?php

class Recherches {


    public static function recherche_annonce($search)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * 
            FROM `logements` 
            INNER JOIN `villes` ON logements.id_ville = villes.id 
            INNER JOIN `communes` ON villes.id_commune = communes.id
            INNER JOIN `chambres` ON logements.id_logement = chambres.id_logement
            INNER JOIN `utilisateurs` ON logements.id_utilsateur = utilsateurs.id
            INNER JOIN `roles` ON utilsateurs.roles_id = roles.id
            WHERE `statut` = 'Publiee' 
            AND `libelle_ville`LIKE '%$search%'
            ORDER BY `date_creation` DESC;
 
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

     
    
}
