<?php

session_start();
define('__ROOT__', dirname(dirname(dirname(__DIR__))));
// header_remove('Location');
//Pour la prod particulier
// $_SESSION['isLoggedIn'] = true;
// $_SESSION['role'] = 'particulier';
// $_SESSION['id_utilisateur'] = '80b571b5a9e3a9d0324f930fd9a7c7f0';
    //Pour la prod proprietaire
// $_SESSION['isLoggedIn'] = true;
// $_SESSION['role'] = 'proprietaire';
// $_SESSION['id_utilisateur'] = '33a0eb73790689cf911e4560a2cb46c6';
// Ici on détermine les superglobales pour la gestion de la session log ou pas
if(!isset($_SESSION['isLoggedIn'])){
    $_SESSION['isLoggedIn'] = false;
}
if(!isset($_SESSION['role'])){
    $_SESSION['role'] = false;
}
if(!isset($_SESSION['id_utilisateur'])){
    $_SESSION['id_utilisateur'] = false;
}
if(!isset($_SESSION['flash'])){
    $_SESSION['flash'] = [];
}