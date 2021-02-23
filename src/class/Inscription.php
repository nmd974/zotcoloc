<?php

class Inscription {

    public static function ajoutTableProprietaire($id, $utilisateur_id, $nom, $prenom, $telephone)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `proprietaire`(`id`, `id_utilisateur`, `nom`, `prenom`, `telephone`) 
            VALUES ('$id', '$utilisateur_id', '$nom', '$prenom', '$telephone')
            ");
            return array(true, $query);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
    
}
