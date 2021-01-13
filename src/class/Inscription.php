<?php

class Inscription {

    public static function email_verify()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `utilisateurs` WHERE 1
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function ajoutTableUser($id, $email, $password)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `utilisateurs`(`id`, `id_role`, `email`, `password`) 
            VALUES ('$id', 4, '$email', '$password')
            ");
            return array(true, $query);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
    
    public static function ajoutTableParticulier($id, $utilisateur_id, $nom, $prenom, $pseudo)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `particulier`(`id`, `id_utilisateur`, `nom`, `prenom`, `pseudo`) 
                VALUES ('$id', '$utilisateur_id','$nom','$prenom','$pseudo')
            ");
            return array(true, $query);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

}
