<?php
    require(dirname(__DIR__).'/libs/session/session.php');
    if(!$_SESSION['isLoggedIn'] && $_SESSION['role'] != "proprietaire"){
        header_remove("Location");
        header("Location:" . getenv("URL_APP") . "/src/pages/home.php");
        exit();
    }
?>
<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/class/Interets.php');?>
<?php require_once(dirname(__DIR__).'/class/Utilisateurs.php');?>
<?php require_once(dirname(__DIR__).'/class/Photos.php');?>
<?php require_once(dirname(__DIR__).'/controllers/editProfilProprietaire.php');?>

<?php require(dirname(__DIR__).'/controllers/utilisateurs/proprietaire/getData.php');?>
<!--Gestion du changement du profil (photo, infos)-->
<?php if(isset($_POST['save_photo_user'])):?>
  <?php if(empty($ma_photo)):?>
      <?php $ajout_photo = photoUtilisateur($_FILES['image_upload'], $_SESSION['id_utilisateur'], '');?>
      <?php else: ?>
        <?php $ajout_photo = photoUtilisateur($_FILES['image_upload'], $_SESSION['id_utilisateur'], $ma_photo[0]->libelle_photo);?>
      <?php endif; ?>
      <?php require(dirname(__DIR__).'/controllers/utilisateurs/proprietaire/getData.php');?>
<?php endif; ?>

<?php 
    if(isset($_POST['save_edit_info_coloc'])){
        $update = editInfosColoc($_POST, $mon_compte[0]->id);
        unset($_POST);
        // $mon_compte = Utilisateurs::moncompteProprietaire($_SESSION['id_utilisateur']);
        require(dirname(__DIR__).'/controllers/utilisateurs/proprietaire/getData.php');
    }
?>

<?php 
    if(isset($_POST['save_edit_info_perso'])){
        $update = editInfosPerso($_POST, $mon_compte[0]->id);
        // // unset($_POST);
        // $mon_compte = Utilisateurs::moncompteProprietaire($_SESSION['id_utilisateur']);
        require(dirname(__DIR__).'/controllers/utilisateurs/proprietaire/getData.php');
    }
?>

<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/photoUser.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/infosColoc.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/infosPerso.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/deleteUser.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/sidebar.php');?>

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
    <div class="container profil_view">
        <?php require_once(dirname(__DIR__).'/includes/compteProprietaire/gererProfil.php');?>
        <?php require_once(dirname(__DIR__).'/includes/compteProprietaire/annonces.php');?>
        <?php require_once(dirname(__DIR__).'/includes/compteProprietaire/dashboard.php');?>
    </div>

    <!--BOUTON DE SWITCH SIDEBAR EN MOBILE-->
    <i class="fa fa-user fa-2x" id="menu-toggle" aria-hidden="true"></i>
</div>

<?php //require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/sidebar_proprio.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>
