<?php
    session_start();
    unset($_SESSION['id_utilisateur']);
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['role']);
    header('Location: ../pages/home.php');
?>