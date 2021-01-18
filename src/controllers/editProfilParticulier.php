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

    function editInfosPerso($data, $id_utilisateur){

    }