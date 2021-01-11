<?php
    session_start();
    define('__ROOT__', dirname(dirname(dirname(__DIR__))));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,200&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <!--Font awesome-->
<script src="https://use.fontawesome.com/c18e5332f2.js"></script>
    <title>ZotColoc</title>
</head>

<body>
    
  <div class="d-flex" id="wrapper">

    
<!-- Page Content -->
<div id="page-content-wrapper">
    <header>
        <!-- barre de navigation -->
        <nav class="navbar navbar-expand-md navbar-light shadow fixed-top">
            <div class="container-fluid">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-house-fill text-green" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="./home.php" class="nav-link active fw-bold" aria-current="page" href="#">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Recherche</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Déposer une Annonce</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active" aria-current="page" href="#">Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a href="./compteParticulier.php" class="nav-link active" aria-current="page" href="#">Mon compte</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>