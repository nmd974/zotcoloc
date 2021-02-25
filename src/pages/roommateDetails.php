<?php if(empty($_GET["id"])){
    header('Location: roommateSearch.php');
    }?>
<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/class/Recherches.php');?>

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
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
crossorigin=""></script>
<script src="../js/mapdetails.js"></script>
<script src="../js/swiper.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>