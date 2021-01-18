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

    public static function ajoutTableUser($id, $email, $password, $role)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `utilisateurs`(`id`, `id_role`, `email`, `password`) 
            VALUES ('$id', $role, '$email', '$password')
            ");
            return array(true, $query);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
    
    public static function ajoutTableParticulier($id, $utilisateur_id, $nom, $prenom, $pseudo, $date_naissance, $date_disponibilite)
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("INSERT INTO `particulier`(`id`, `id_utilisateur`, `nom`, `prenom`, `pseudo`, `date_naissance`, `date_disponibilite`) 
                VALUES ('$id', '$utilisateur_id','$nom','$prenom','$pseudo', '$date_naissance', '$date_disponibilite')
            ");
            return array(true, $query);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

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
