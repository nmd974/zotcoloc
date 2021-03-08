<?php
require_once(__DIR__ . '/Connection.php');
class Utilisateurs {

    public static function monCompteParticulier($id)
    {
        $pdo = Connection::getPDO();
        $error = null;
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

    public static function monCompteProprietaire($id)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * FROM `utilisateurs` 
            INNER JOIN `proprietaire` ON proprietaire.id_utilisateur = utilisateurs.id
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
        $pdo = Connection::getPDO();
        $error = null;
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
        $pdo = Connection::getPDO();
        $error = null;
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
        $pdo = Connection::getPDO();
        $error = null;
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

    public static function favorisParticulier($id_particulier)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * FROM `favoriser_logement` WHERE `id_particulier` = '$id_particulier'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function candidaturesParticulier($id_particulier)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * FROM `candidater_chambre` WHERE `id_particulier` = '$id_particulier'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    
    public static function annoncesParticulier($id_utilisateur)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("SELECT * FROM `logements` 
            INNER JOIN `chambres` ON chambres.id_logement = logements.id_logement 
            INNER JOIN `villes` ON villes.id = logements.id_ville
            WHERE `id_utilisateur` = '$id_utilisateur' 
            AND `statut` != 'Supprimee'
            AND `statut_chambre` != 'Supprimee'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function updateInfosPro($id_proprietaire, $site_web, $description)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("UPDATE `proprietaire` 
            SET `site_web`='$site_web',`description`='$description'
            WHERE `id` = '$id_proprietaire'
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    public static function updatePersoProprio($id, $nom, $prenom, $telephone)
    {
        $pdo = Connection::getPDO();
        $error = null;
        try{
            $query = $pdo->query("UPDATE `proprietaire` 
            SET `nom`='$nom',`prenom`='$prenom',`telephone`='$telephone'
            WHERE `id` = '$id'
            ");
            return array(true, '');
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    

}