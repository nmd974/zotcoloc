<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/class/Interets.php');?>
<?php require_once(dirname(__DIR__).'/class/Utilisateurs.php');?>
<?php require_once(dirname(__DIR__).'/class/Photos.php');?>
<?php require_once(dirname(__DIR__).'/controllers/editProfilParticulier.php');?>

<?php
    if(!$_SESSION['isLoggedIn']){
        header('Location: ./home.php');
    }else{
        //Chargement des données correspondantes à l'id lors de l'arrivée sur page
        $mon_id_particulier = Utilisateurs::monCompteParticulier($_SESSION['id_utilisateur']);
        $ma_photo = Photos::photosByIdUser($_SESSION['id_utilisateur']);
        $mes_interets = Interets::interetsByParticulierId($mon_id_particulier[1][0]->id);
        $mes_interet_list = [];
        foreach($mes_interets[1] as $interet){
            array_push($mes_interet_list, $interet->id_interet);
        }
        $mes_favoris = Utilisateurs::favorisParticulier($mon_id_particulier[1][0]->id);
        $mes_candidatures = Utilisateurs::candidaturesParticulier($mon_id_particulier[1][0]->id);
        $mes_annonces = Utilisateurs::annoncesParticulier($_SESSION['id_utilisateur']);
    }
?>
<?php if(isset($_POST['save_photo_user'])):?>
  <?php if(empty($ma_photo[1])):?>
      <?php $ajout_photo = photoUtilisateur($_FILES['image_upload'], $_SESSION['id_utilisateur'], '');?>
        <?php $ma_photo = Photos::photosByIdUser($_SESSION['id_utilisateur']);?>
      <?php else: ?>
        <?php $ajout_photo = photoUtilisateur($_FILES['image_upload'], $_SESSION['id_utilisateur'], $ma_photo[1][0]->libelle_photo);?>
        <?php $ma_photo = Photos::photosByIdUser($_SESSION['id_utilisateur']);?>
      <?php endif; ?>
<?php endif; ?>

<?php 
    if(isset($_POST['save_edit_info_coloc'])){
        $update = editInfosColoc($_POST, $mon_id_particulier[1][0]->id);
        unset($_POST);
        $mon_id_particulier = Utilisateurs::monCompteParticulier($_SESSION['id_utilisateur']);
    }
?>

<?php 
    if(isset($_POST['save_edit_info_perso'])){
        $update = editInfosPerso($_POST, $mon_id_particulier[1][0]->id);
        $mon_id_particulier = Utilisateurs::monCompteParticulier($_SESSION['id_utilisateur']);
    }
?>

<?php 
    if(isset($_POST['save_edit_interets'])){
        $update = editInterets($_POST, $mon_id_particulier[1][0]->id, $mes_interet_list);
        $mes_interets = Interets::interetsByParticulierId($mon_id_particulier[1][0]->id);
        $mes_interet_list = [];
        foreach($mes_interets[1] as $interet){
            array_push($mes_interet_list, $interet->id_interet);
        }
    }
?>

<?php require_once(dirname(__DIR__).'/includes/compteParticulier/modals/photoUser.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteParticulier/modals/infosColoc.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteParticulier/modals/infosPerso.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteParticulier/modals/interets.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteParticulier/sidebar.php');?>

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
    <?php if(isset($update)){
        var_dump($update);
    }
    ?>
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
<script src="../js/modals.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>