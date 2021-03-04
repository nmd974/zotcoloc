<?php

session_start();
define('__ROOT__', dirname(dirname(dirname(__DIR__))));

if(!isset($_SESSION['isLoggedIn'])){
    $_SESSION['isLoggedIn'] = false;
}
if(!isset($_SESSION['role'])){
    $_SESSION['role'] = false;
}
if(!isset($_SESSION['id_utilisateur'])){
    $_SESSION['id_utilisateur'] = false;
}
$_ENV['URL_APP'] = "http://127.0.0.1:8000"; //ou en ligne = https://zotcoloc.herokuapp.com 
//ou http://127.0.0.1:8000
//En ligne :
//putenv("URL_APP=https://zotcoloc.herokuapp.com");
//En local :
 putenv("URL_APP=http://127.0.0.1:8000");