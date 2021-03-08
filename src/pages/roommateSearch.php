<?php unset($_GET['btn-search']);?>
 <?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?> 
 <?php require_once(dirname(__DIR__).'/controllers/annonces/recherches/getData.php');?>
 <?php require_once(dirname(__DIR__).'/class/Pagination.php');?>


<div id="wrapper_page_content">
<?php
    //Gestion de la pagination
    //On récupère d'abord la page où l'on est
    if(isset($_GET['page'])){
        $page_actuelle = intval($_GET['page']);
        $pagination = new Pagination(
            $annonces,
            10, //Ici c'est le nombre d'ateliers par pages
            intval($_GET['page'])
        );
            
        if(intval($_GET['page']) > 1){
            $compteur= ($_GET['page'] * 10) - 2; //On calcule à partir d'où il faut afficher
        }else{
            $compteur=1;
    }
    }
?>
<!--Ici on gère là où on doit prendre les données selon la page actuelle-->
<?php if($compteur > $pagination->intervalleMin() && $compteur <= $pagination->intervalleMax()):?>
    <?php $compteur++;?>
    <?php $pagination->nombreAfficheActuel();?>
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
                                <h2 class="vidaloka m-0 h2"><?php echo htmlspecialchars($count['nb_rslt']);?><span class="text-green"> <?php if($count['nb_rslt'] == 0){ echo("annonce");
                                }else{
                                    echo("annonces");
                                }?></span> actuellement
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
   <?php endif;?>
    <?= $pagination->toHTMLPrevious();?>
      <?php for($i = 1; $i < $pagination->nombrePages + 1; $i++):?>
        <?= $pagination->toHTMLPages($i);?>
      <?php endfor?>
        <?= $pagination->toHTMLNext();?>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/validator.js"></script>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>