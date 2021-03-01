 <?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?> 
 <?php require_once(dirname(__DIR__).'/controllers/annonces/recherches/getData.php');?>


<div id="wrapper_page_content">

    <section class="container-fluid margin-search">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <?php require_once(dirname(__DIR__).'/includes/annonces/recherche/input.php');?> 
                </div>                           
            <div class="row bg-height">
                <div class="col-lg-12 col-md-12 card-order mt-3">
                    <div class="mb-5">
                        <div class="border-one ps-1">
                            <div class="border-two ps-3">
                                <p class="text-secondary m-0 poppins h5">ANNONCES</p>
                                <h2 class="vidaloka m-0 h2"><?php echo htmlspecialchars($count['nb_rslt']);?><span class="text-green"> annonces</span> actuellement
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-2 col-8 d-flex justify-content-center flex-wrap view-details">
                    <?php require_once(dirname(__DIR__).'/includes/annonces/recherche/resultat.php');?>
                </div>
            </div>
        </div>
    </section>
   


<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/validator.js"></script>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>