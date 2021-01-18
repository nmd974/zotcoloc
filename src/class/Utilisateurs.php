<?php

class Utilisateurs {

    public static function monCompteParticulier($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `utilisateurs` 
            INNER JOIN `particulier` ON particulier.id_utilisateur = utilisateurs.id
            WHERE utilisateurs.id = '$id'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function mesFavoris($id)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `utilisateurs` 
            INNER JOIN `particulier` ON particulier.id_utilisateur = utilisateurs.id
            WHERE utilisateurs.id = '$id'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function updateColocParticulier($id, $pseudo, $description, $ecole, $date_naissance, $date_disponibilite)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("UPDATE `particulier` 
            SET `description`='$description',`pseudo`='$pseudo',`ecole`='$ecole',`date_naissance`='$date_naissance',`date_disponibilite`='$date_disponibilite' 
            WHERE `id` = '$id'
            ");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    
    public static function updatePersoParticulier($id, $nom, $prenom, $telephone, $genre)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("UPDATE `particulier` 
            SET `nom`='$nom',`prenom`='$prenom',`telephone`='$telephone',`genre`='$genre'
            WHERE `id` = '$id'
            ");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }


}