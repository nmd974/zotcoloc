<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php
if(!$_SESSION['isLoggedIn'] || $_SESSION['role'] != "administrateur"){
    header('Location: home.php');
}
?>
<?php require_once(__ROOT__.'/src/controllers/utilisateurs/admin/getData.php');?>
<?php var_dump("OK");?>
<?php require_once(dirname(__DIR__).'/includes/admin/modals/tables.php');?>
<?php var_dump("OK");?>
<?php require_once(dirname(__DIR__).'/includes/admin/modals/photoUser.php');?>
<?php var_dump("OK");?>
<?php require_once(dirname(__DIR__).'/includes/admin/sidebar.php');?>
<?php var_dump("OK");?>

<?php if(isset($_POST['save_photo_user'])):?>
  <?php if(empty($ma_photo)):?>
      <?php $ajout_photo = photoUtilisateur($_FILES['image_upload'], $_SESSION['id_utilisateur'], '');?>
        <?php $ma_photo = Photos::photosByIdUser($_SESSION['id_utilisateur']);?>
      <?php else: ?>
        <?php $ajout_photo = photoUtilisateur($_FILES['image_upload'], $_SESSION['id_utilisateur'], $ma_photo[1][0]->libelle_photo);?>
        <?php $ma_photo = Photos::photosByIdUser($_SESSION['id_utilisateur']);?>
      <?php endif; ?>
<?php endif; ?>

<div class="container-fluid" id="wrapper-content">
    <!--TITRE A CHANGER SELON LE INCLUDE AFFICHE-->
    <div class="container">
        <div class="mb-5 subtitle">
            <div class="border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5 text-uppercase" id="title_haut">Administration du site</p>
                    <h2 class="vidaloka m-0 h1" id="title_bas">Gestion des<span class="text-green"> tables</span></h2>
                </div>
            </div>
        </div>
    </div>
    <!--METTRE LE CONTENU ICI-->
    <div class="container">
        <?php require_once(dirname(__DIR__).'/includes/admin/tables.php');?>
        <?php require_once(dirname(__DIR__).'/includes/admin/utilisateurs.php');?>
        <?php require_once(dirname(__DIR__).'/includes/admin/annonces.php');?>
        <?php require_once(dirname(__DIR__).'/includes/admin/logs.php');?>
    </div>
    
    <!--BOUTON DE SWITCH SIDEBAR EN MOBILE-->
    <i class="fa fa-user fa-2x" id="menu-toggle" aria-hidden="true"></i>
</div>

<?php //require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/sidebar_admin.js"></script>
<script src="../js/modals.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>