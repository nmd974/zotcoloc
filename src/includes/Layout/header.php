<?php require_once(dirname(dirname(__DIR__)).'/libs/session/session.php'); ?>
<?php var_dump($_SESSION);?>
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
    <!-- link pour la map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin="" />
    <link rel="stylesheet" href="../style/style.css">
    <!--Font awesome-->
    <script src="https://use.fontawesome.com/c18e5332f2.js"></script>
    <!--AOS Animate on scroll library-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>ZotColoc</title>
    
</head>

<body>
    
  <div class="d-flex" id="wrapper">

<!--LOADER-->
  <div class="h-100 w-100 bg-light position-absolute d-flex justify-content-center align-items-center" id="loader_wrapper"  style="z-index: 10001">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<?php if(isset($_SESSION['flash'])):?>
<?php if($_SESSION['flash'][0] == "Success"):?>
<div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 10002">
  <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" id="liveToast" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
      <?= $_SESSION['flash'][1] ?>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<?php else:?>
<div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 10002">
  <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" id="liveToast" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <?= $_SESSION['flash'][1] ?>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<?php endif;?>
<?php endif;?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <header>
    
        <!-- barre de navigation -->
        <nav class="navbar navbar-expand-md navbar-light shadow fixed-top">
            <div class="container-fluid">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-house-fill text-green " viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg>
                
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="./home.php" class="nav-link active" aria-current="page">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a href="./roommateSearch.php" class="nav-link active" aria-current="page">Recherche</a>
                            </li>
                            <?php if(!$_SESSION['isLoggedIn']):?>
                            <li class="nav-item">
                                <a href="./inscriptionParticulier.php" class="nav-link active" aria-current="page">Créer un compte</a>
                            </li>
                            <li class="nav-item">
                                <a href="./deposerAnnonce.php" class="nav-link active" aria-current="page">Déposer une annonce</a>
                            </li>
                            <?php endif; ?>
                            <?php if($_SESSION['isLoggedIn'] && $_SESSION['role'] == "proprietaire"):?>
                                <li class="nav-item">
                                    <a href="./creationAnnoncePage.php" class="nav-link active" aria-current="page">Créer une Annonce</a>
                                </li>
                            <?php endif; ?>
                            <?php if($_SESSION['isLoggedIn'] && $_SESSION['role'] == "particulier"):?>
                            <li class="nav-item">
                                <a href="./compteParticulier.php" class="nav-link active" aria-current="page">Mon compte</a>
                            </li>
                            <?php endif; ?>
                            <?php if($_SESSION['isLoggedIn'] && $_SESSION['role'] == "proprietaire"):?>
                            <li class="nav-item">
                                <a href="./compteProprietaire.php" class="nav-link active" aria-current="page">Mon compte</a>
                            </li>
                            <?php endif; ?>
                            <?php if($_SESSION['isLoggedIn'] && $_SESSION['role'] == "administrateur"):?>
                            <li class="nav-item">
                                <a href="./compteProprietaire.php" class="nav-link active" aria-current="page">Mon compte</a>
                            </li>
                            <?php endif; ?>
                            <?php if(!$_SESSION['isLoggedIn']):?>
                            <li class="nav-item">
                                <a href="./seconnecter.php" class="nav-link active" aria-current="page">Se connecter</a>
                            </li>
                            <?php else:?>
                            <li class="nav-item">
                                <a href="../controllers/logout.php" class="nav-link active" aria-current="page"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                
            </div>
        </nav>

    </header>