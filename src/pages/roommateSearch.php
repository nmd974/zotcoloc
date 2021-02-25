 <?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?> 
 <?php// require_once(dirname(__DIR__).'/class/Recherches.php');?>
 <?php require_once(dirname(__DIR__).'/controllers/annonces/recherches/getAllData.php');?>
 <?php if(isset($_GET["btn-search"])){
     $search=htmlspecialchars($_GET["search-room"], ENT_QUOTES);
      require_once(dirname(__DIR__).'/controllers/annonces/recherches/getDataSearch.php');
   // $annonces = Recherches::recherche_annonce(htmlEntities($_GET["search-room"]));
   // $nombres = Recherches::nombre_annonce(htmlEntities($_GET["search-room"]));
 } 
  ?>

<div id="wrapper_page_content">

<section class="container-fluid margin-search">
        <div class="row">
            <div class="col-lg-8 col-md-12">
            <?php require_once(dirname(__DIR__).'/includes/annonces/recherche/input.php');?>
                
            </div>
            <div class="col-md-12 col-lg-4  p-0 mt-1 d-flex flex-wrap text-start">
                <!-- bouton filtre du loyer -->
                <!-- barre de recherche -->

                <?php //require_once(dirname(__DIR__).'/includes/annonces/recherche/filtre/prix.php');?>
                
                <!-- bouton filtre type -->

                <?php //require_once(dirname(__DIR__).'/includes/annonces/recherche/filtre/type.php');?>
                
                <!-- bouton filtre disponibilité -->

                <?php //require_once(dirname(__DIR__).'/includes/annonces/recherche/filtre/disponibilite.php');?>

                <!-- bouton plus de filtre -->

                <?php //require_once(dirname(__DIR__).'/includes/annonces/recherche/filtre/plus.php');?>
                
                <!-- bouton modal loyer  version mobile -->
                <!-- Button trigger modal -->

                <?php //require_once(dirname(__DIR__).'/includes/annonces/recherche/modals/loyerMobile.php');?>

            </div>                              
        <div class="row bg-height">
        <!-- carte en commentaire pour la prochaine version -->
            <!-- la map -->
            <!-- <div class="col-lg-6 col-md-12 map-order mt-3">
                <div id="map"></div>
            </div> -->
            <div class="col-lg-12 col-md-12 card-order mt-3">
                <?php require_once(dirname(__DIR__).'/includes/annonces/recherche/titre.php');?>
            </div>
            <div class="offset-2 col-8 d-flex justify-content-center flex-wrap view-details">
                    <!-- ////////////////////////affichage des annonces à partir d'une recherche///////////////////// -->
                <?php require_once(dirname(__DIR__).'/includes/annonces/recherche/resultat.php');?>
              
                            <!-- ////////////////////////affichage des annonces publiés///////////////////// -->
                <?php require_once(dirname(__DIR__).'/includes/annonces/recherche/resultatAll.php');?>
              
         
                </div>
            </div>
    </section>
   
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
crossorigin=""></script>
<script src="../js/map.js"></script>
<script src="../js/range.js"></script>
<script src="../js/search.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>