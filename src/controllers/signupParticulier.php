<?php
    session_start();
    if(isset($_GET['q'])){
        if(!$_SESSION['liste_interets']){
            $_SESSION['liste_interets'] = [];
            array_push($_SESSION['liste_interets'],$_GET['q']);
        }else{

            if(!in_array($_GET['q'], $_SESSION['liste_interets'])){
                array_push($_SESSION['liste_interets'],$_GET['q']);
                var_dump(__ROOT__);
                // file_put_contents(dirname(__DIR__).'/data/data.json', json_encode($_SESSION['liste_interets']));
            }else{
                $elementIndice = array_search($_GET['q'], $_SESSION['liste_interets']);//Supression de l'id dans la session en cours en recherchant l'emplacement de l'id dans les differents tableaux
                unset($_SESSION['liste_interets'][$elementIndice]);
                // file_put_contents(dirname(__DIR__).'/data/data.json', json_encode($_SESSION['liste_interets']));
            }
            
        }
        var_dump($_SESSION['liste_interets']);
    }
?>