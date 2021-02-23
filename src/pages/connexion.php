<?php
$dbh = new PDO('mysql:host=localhost;  root@localhost= zotcoloc', 'root', '');


if (isset($_POST['connexion']))     //Pour gérer la connexion en mode admin
{
    if ($_POST['mail_user'] === "admin" && $_POST['mdp_user'] === "admin") {
        $_SESSION['admin'] = true;     //On est connecté en mode admin
    } else {
        foreach ($membre as $key => $value) {
            if ($value['mail'] === $_POST['mail_user'] && $value['password'] === hash('md5', $_POST['mdp_user'])) {
                $_SESSION['user'] = $value['name'];
                $_SESSION['mail'] = $value['mail'];
                
            }
        }
    }
    header('location: ../index.php'); //On redirige vers la page d'accueil
    exit();
}

if (isset($_POST['deconnexion'])) {  //Lorsque l'on se déconnecte
    $_SESSION['admin'] = false; //On est pu en mode admin donc c'est faux
    $_SESSION['user'] = ''; //On met le user à rien
    $_SESSION['mail'] = '';
    session_destroy();
    header('location: ../index.php');    //On redirige vers la page d'accueil
    exit();
}
