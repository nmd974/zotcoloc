<?php
//array(1) { ["photos_logement"]=> array(5) { ["name"]=> array(2) { [0]=> string(36) "icons8-team-seDjj4dmC9s-unsplash.jpg" [1]=> string(48) "benjaminrobyn-jespersen-Ai9_QJaZfMc-unsplash.jpg" } ["type"]=> array(2) { [0]=> string(10) "image/jpeg" [1]=> string(10) "image/jpeg" } ["tmp_name"]=> array(2) { [0]=> string(45) "C:\Users\jhapa\AppData\Local\Temp\phpA4D5.tmp" [1]=> string(45) "C:\Users\jhapa\AppData\Local\Temp\phpA4D6.tmp" } ["error"]=> array(2) { [0]=> int(0) [1]=> int(0) } ["size"]=> array(2) { [0]=> int(32033) [1]=> int(1970394) } } }
    function controleImageArray($image_upload, $indiceArray)//On renvoie dans un tableau l'erreur et le message d'erreur ou l'erreur et le nom de l'image
    {
        $error = false;
        $fileName = $image_upload['name'][$indiceArray]; //On met dans une variable le nom de l'image pour vérifier si l'utilisateur a ajouté une
        $validExt = array('.jpg', '.jpeg', '.gif', '.png'); //On spécifie les extensions que l'on souhaite prendre
        $fileExt = strtolower(substr(strrchr($fileName, '.'), 1)); //On met en minuscule tout le nom du fichier puis à partir du . on récupère tout ce qu'il y a à la suite soit l'extension et on enregistre dans une nouvelle variable
        if(!in_array("." . $fileExt, $validExt))//On recherche dans le tableau des extensions valides si l'extension du fichier ajouté correspond
            { 
                $error = true;
                return array($error, '<div class="alert alert-danger">Le fichier n\'est pas une image !!</div>');
                exit();
            }
        if($image_upload['error'][$indiceArray] > 0)//On verifie dans la variable $_FILES s'il n'y a pas d'erreur interne
            {
                $error = true;
                return array($error, '<div class="alert alert-danger">Erreur survenue lors du transfert de l\'image</div>'); //Si oui alors on arrete la fonction et on affiche qu'il y a eu une erreur lors du transfert
                exit();
            }
        $maxSize = 10485760; //On spécifie ici la taille maximale de l'image en bytes ici equivalent à 10mo 10485760
        $fileSize = $image_upload['size'][$indiceArray];//On recupere via la $_FILES la taille de l'image ajoutée dans l'input
        if($fileSize > $maxSize) //Taille de l'image doit être < à $maxSize
            {
                $error = true;
                return array($error, '<div class="alert alert-danger"> Le fichier est trop lourd !!</div>'); //Si trop lourd alors on envoie le message que le fichier est trop lourd
                exit();
            }
        if(!$error){
            //Arrive ici cela veut dire que nos vérifications on été validées alors on peut procéder à l'envoie de l'image dans son bon dossier
            $tmpName = $image_upload['tmp_name'][$indiceArray]; //On recupère le nom temporaire ajouté par le serveur pour la gestion de l'image
            $idName = md5(uniqid(rand(), true)); //On attribue un id unique à l'image via la fonction md5 uniqid et random
            $fileDir = __ROOT__."/src/images/" . $idName . "." . $fileExt; //On spécifie la direction d'enregistrement de l'image
            $image_upload[$indiceArray] = $idName . "." . $fileExt; //On attribue dans la superglobale $_POST le nom de l'image qui ira dans le tableau
            $resultat = move_uploaded_file($tmpName, $fileDir);
            if($resultat){
                return array(false, $image_upload[$indiceArray]);//On retourne le nom de l'image pour enregistrement
            }
        }
            
    }

    function controleImage($image_upload)//On renvoie dans un tableau l'erreur et le message d'erreur ou l'erreur et le nom de l'image
    {
        $error = false;
        $fileName = $image_upload['name']; //On met dans une variable le nom de l'image pour vérifier si l'utilisateur a ajouté une
        $validExt = array('.jpg', '.jpeg', '.gif', '.png'); //On spécifie les extensions que l'on souhaite prendre
        $fileExt = strtolower(substr(strrchr($fileName, '.'), 1)); //On met en minuscule tout le nom du fichier puis à partir du . on récupère tout ce qu'il y a à la suite soit l'extension et on enregistre dans une nouvelle variable
        if(!in_array("." . $fileExt, $validExt))//On recherche dans le tableau des extensions valides si l'extension du fichier ajouté correspond
            { 
                $error = true;
                return array($error, '<div class="alert alert-danger">Le fichier n\'est pas une image !!</div>');
                exit();
            }
        if($image_upload['error'] > 0)//On verifie dans la variable $_FILES s'il n'y a pas d'erreur interne
            {
                $error = true;
                return array($error, '<div class="alert alert-danger">Erreur survenue lors du transfert de l\'image</div>'); //Si oui alors on arrete la fonction et on affiche qu'il y a eu une erreur lors du transfert
                exit();
            }
        $maxSize = 10485760; //On spécifie ici la taille maximale de l'image en bytes ici equivalent à 10mo 10485760
        $fileSize = $image_upload['size'];//On recupere via la $_FILES la taille de l'image ajoutée dans l'input
        if($fileSize > $maxSize) //Taille de l'image doit être < à $maxSize
            {
                $error = true;
                return array($error, '<div class="alert alert-danger"> Le fichier est trop lourd !!</div>'); //Si trop lourd alors on envoie le message que le fichier est trop lourd
                exit();
            }
        if(!$error){
            //Arrive ici cela veut dire que nos vérifications on été validées alors on peut procéder à l'envoie de l'image dans son bon dossier
            $tmpName = $image_upload['tmp_name']; //On recupère le nom temporaire ajouté par le serveur pour la gestion de l'image
            $idName = md5(uniqid(rand(), true)); //On attribue un id unique à l'image via la fonction md5 uniqid et random
            $fileDir = __ROOT__."/src/images/" . $idName . "." . $fileExt; //On spécifie la direction d'enregistrement de l'image
            $image_upload = $idName . "." . $fileExt; //On attribue dans la superglobale $_POST le nom de l'image qui ira dans le tableau
            $resultat = move_uploaded_file($tmpName, $fileDir);
            if($resultat){
                return array(false, $image_upload);//On retourne le nom de l'image pour enregistrement
            }
        }
            
    }
?>