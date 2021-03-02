<?php if(empty($_GET["id"])){
    header('Location: home.php');
    }?>
<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/class/Recherches.php');?>
<?php require_once(dirname(__DIR__).'/class/Photos.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editLogement.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editChambre.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editPhotoLogement.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editPhotoChambre.php');?>
<?php $annonces = Recherches::annonce_details(htmlEntities($_GET["id"]))?>
        
<?php if(!$annonces[0]):?>
<div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
<?php else :?>

<div id="wrapper_page_content">
    <section class="container">
            <!-- carousel -->
            <div class="d-flex justify-content-center align-items-center">
                <?php require_once(dirname(__DIR__).'/includes/annonces/detail/caroussel.php');?>        
            </div>
    </section> 
    <section class="container">
        <div class="row">    
            <div class="col-lg-8 col-md-12">
                <?php require_once(dirname(__DIR__).'/includes/annonces/detail/chambre.php');?>
            <hr>
                <?php require_once(dirname(__DIR__).'/includes/annonces/detail/logement.php');?>
            </div>
        </div>
            <!-- ---------------------------------------------------------- -->
        <div class="col-md-12 col-lg-4 position-relative">
            <?php require_once(dirname(__DIR__).'/includes/annonces/detail/resumer.php');?>
                
        </div>
            
            <?php endif; ?>
            <?php require_once(dirname(__DIR__).'/includes/annonces/detail/modal.php');?>
    </section>  
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>