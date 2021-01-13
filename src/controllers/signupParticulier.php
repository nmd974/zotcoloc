<?php
    //Gestion de la superglobale session pour enregistrer les interets de l'utilisateur
    //NE SERT PLUS A RIEN
    session_start();
    if(isset($_GET['interet'])){
        if(!$_SESSION['liste_interets']){
            $_SESSION['liste_interets'] = [];
            array_push($_SESSION['liste_interets'],$_GET['interet']);
        }else{

            if(!in_array($_GET['interet'], $_SESSION['liste_interets'])){
                array_push($_SESSION['liste_interets'],$_GET['interet']);
            }else{
                $elementIndice = array_search($_GET['interet'], $_SESSION['liste_interets']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                unset($_SESSION['liste_interets'][$elementIndice]);
            }
        }
    }
    var_dump($_SESSION);
    if(isset($_GET['ville'])){
        if(!$_SESSION['liste_ville']){
            $_SESSION['liste_ville'] = [];
            array_push($_SESSION['liste_ville'],substr(strrchr($_GET['ville'], '_'), 1));
        }else{

            if(!in_array(substr(strrchr($_GET['ville'], '_'), 1), $_SESSION['liste_ville'])){
                array_push($_SESSION['liste_ville'],substr(strrchr($_GET['ville'], '_'), 1));
            }else{
                $elementIndice = array_search(strtolower(substr(strrchr($_GET['ville'], '_'), 1)), $_SESSION['liste_ville']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                unset($_SESSION['liste_ville'][$elementIndice]);
            }
        }
    }
?>