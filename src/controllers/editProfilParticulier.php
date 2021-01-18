<?php
    require_once(dirname(__DIR__).'/controllers/imageControl.php');
    require_once(dirname(__DIR__).'/class/Photos.php');
    require_once(dirname(__DIR__).'/class/Utilisateurs.php');
    require_once(dirname(__DIR__).'/class/Interets.php');

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

    function editInfosColoc($data, $id_particulier){
        $pseudo = htmlentities($data['pseudo'], ENT_QUOTES);
        $description = htmlentities($data['description'], ENT_QUOTES);
        $ecole = htmlentities($data['ecole'], ENT_QUOTES);
        $date_naissance = htmlentities($data['date_naissance'], ENT_QUOTES);
        $date_disponibilite = htmlentities($data['date_disponibilite'], ENT_QUOTES);
        $update = Utilisateurs::updateColocParticulier($id_particulier, $pseudo, $description, $ecole, $date_naissance, $date_disponibilite);
    }

    function editInfosPerso($data, $id_particulier){
        $nom = htmlentities($data['nom'], ENT_QUOTES);
        $prenom = htmlentities($data['prenom'], ENT_QUOTES);
        $telephone = htmlentities($data['telephone'], ENT_QUOTES);
        $genre = htmlentities($data['genre'], ENT_QUOTES);
        $update = Utilisateurs::updatePersoParticulier($id_particulier, $nom, $prenom, $telephone, $genre);
        // return $update;
    }

    function editInterets($data, $id_particulier, $old_data){
        foreach($old_data as $value){
            $validationInscription = Interets::deleteInterets($id_particulier, $value);
        }
        foreach($data['interets'] as $value){
            $validationInscription = Interets::ajoutInteretsParticulier($id_particulier, $value);
        }
    }

