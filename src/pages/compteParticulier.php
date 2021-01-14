<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>

<?php require_once(dirname(__DIR__).'/includes/sidebar.php');?>

<div class="container-fluid" id="wrapper-content">
    <!--TITRE A CHANGER SELON LE INCLUDE AFFICHE-->
    <div class="container">
        <div class="mb-5 subtitle">
            <div class="border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5 text-uppercase" id="title_haut">Mon profil</p>
                    <h2 class="vidaloka m-0 h1" id="title_bas">Gérer mon:<span class="text-green"> profil</span></h2>
                </div>
            </div>
        </div>
    </div>
    <!--METTRE LE CONTENU ICI-->
    <div class="container">
        <?php require_once(dirname(__DIR__).'/includes/compteParticulier/gererProfil.php');?>
        <?php require_once(dirname(__DIR__).'/includes/compteParticulier/annonces.php');?>
        <?php require_once(dirname(__DIR__).'/includes/compteParticulier/candidatures.php');?>
        <?php require_once(dirname(__DIR__).'/includes/compteParticulier/dashboard.php');?>
        <?php require_once(dirname(__DIR__).'/includes/compteParticulier/favoris.php');?>
    </div>

    <!--BOUTON DE SWITCH SIDEBAR EN MOBILE-->
    <i class="fa fa-user fa-2x" id="menu-toggle" aria-hidden="true"></i>
</div>

<?php //require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/sidebar.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>