<?php

include './Connection.php';

class Annonces {

 //A MODIFIER POUR RAJOUTER ACTIVER

    public static function annonce_total()
    {
        $pdo = Connection::getPDO();
        $error = null;
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