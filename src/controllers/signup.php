<?php
//NE SERT PLUS
    //Gestion de la superglobale session pour enregistrer les interets de l'utilisateur
    session_start();
    if(isset($_GET['q'])){
        if(!$_SESSION['liste_interets']){
            $_SESSION['liste_interets'] = [];
            array_push($_SESSION['liste_interets'],$_GET['q']);
        }else{

            if(!in_array($_GET['q'], $_SESSION['liste_interets'])){
                array_push($_SESSION['liste_interets'],$_GET['q']);
                // file_put_contents(dirname(__DIR__).'/data/data.json', json_encode($_SESSION['liste_interets']));
            }else{
                $elementIndice = array_search($_GET['q'], $_SESSION['liste_interets']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                unset($_SESSION['liste_interets'][$elementIndice]);
                // file_put_contents(dirname(__DIR__).'/data/data.json', json_encode($_SESSION['liste_interets']));
            }
            
        }
        var_dump($_SESSION['liste_interets']);
    }

    //Gestion de l'enregistrement en bdd dans la table utilisateur
    // function addUser(){
    //     $id = md5(uniqid(rand(), true));
    //     $email = htmlentities($_GET['e'], ENT_QUOTES);
    //     $password = htmlentities($_GET['p'], ENT_QUOTES);
    //     $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
    //     $error = null;
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     try{

    //         $query = $pdo->prepare("INSERT INTO `utilisateurs`(`id`, `id_role`, `email`, `password`) 
    //         VALUES ('$id', 4, '$email', '$password')
    //         ");
    //         $data = $query->fetchAll(PDO::FETCH_OBJ);
    //         return array(true, $data);
    //     }catch(PDOException $e){
    //         $error = $e->getMessage();
    //         return array(false, $error);
    //     }
    // }
    if(isset($_GET['e']) && isset($_GET['p'])){
        // $req = addUser();
        // var_dump($req);
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `utilisateurs` WHERE 1
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            $validation = true;
            foreach($data as $email){
                if($email->email == $_GET['e']){
                    $validation = false;
                }
            }
            var_dump($validation);
            // return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }

    function addUser(){
        // $id = md5(uniqid(rand(), true));
        // $email = htmlentities($e, ENT_QUOTES);
        // $password = htmlentities($p, ENT_QUOTES);
        // $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        // $error = null;
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // try{

        //     $query = $pdo->prepare("INSERT INTO `utilisateurs`(`id`, `id_role`, `email`, `password`) 
        //     VALUES ('$id', 4, '$email', '$password')
        //     ");

        //     //$data = $query->fetchAll(PDO::FETCH_OBJ);
        //     return array(true, true);
        // }catch(PDOException $e){
        //     $error = $e->getMessage();
        //     return array(false, $error);
        // }
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zotcoloc;charset=utf8', 'root', '');
        $error = null;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $pdo->query("SELECT * FROM `utilisateur` WHERE 1
            ");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return array(true, $data);
        }catch(PDOException $e){
            $error = $e->getMessage();
            return array(false, $error);
        }
    }
?>