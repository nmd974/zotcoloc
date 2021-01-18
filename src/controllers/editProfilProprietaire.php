<?php
    require_once(dirname(__DIR__).'/controllers/imageControl.php');
    require_once(dirname(__DIR__).'/class/Photos.php');
    require_once(dirname(__DIR__).'/class/Utilisateurs.php');

    function photoUtilisateur($image, $id_utilisateur, $old_photo){
        if($old_photo !== ''){
            $oldFilename = __ROOT__."/src/images/" . $old_photo;
            unlink($oldFilename);
            Photos::deletePhotosByIdUser($id_utilisateur);
            Photos::deletePhotosByLibelle($old_photo);
        }

        $verification_image = controleImage($image);
        if(!$verification_image[0]){
            $id_photo = md5(uniqid(rand(), true));
            Photos::photoTableGenerale($id_photo, $verification_image[1]);
            Photos::createPhotoUser($id_utilisateur, $id_photo);
        }
    }

    function editInfosColoc($data, $id_proprietaire){
        $site_web = htmlentities($data['site_web'], ENT_QUOTES);
        $description = htmlentities($data['description'], ENT_QUOTES);
        $update = Utilisateurs::updateInfosPro($id_proprietaire, $site_web, $description);
    }

    function editInfosPerso($data, $id_proprietaire){
        $nom = htmlentities($data['nom'], ENT_QUOTES);
        $prenom = htmlentities($data['prenom'], ENT_QUOTES);
        $telephone = htmlentities($data['telephone'], ENT_QUOTES);
        $update = Utilisateurs::updatePersoProprio($id_proprietaire, $nom, $prenom, $telephone);
        // return $update;
    }

