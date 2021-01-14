<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/controllers/createAnnonce.php');?>

<?php
    if(isset($_POST['enregistrer_annonce'])){
        if(!isset($_POST['id_logement']) && !isset($_POST['id_logement']))
        $validationCreation = creationAnnonce($_POST);
        if($validationCreation[0]){
            header('Location: ./home.php');
        }
    }
?>
<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Ajouter annonce Colocation</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Etape 1/4:<span class="text-green"> Description</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper_page_content">

    <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/timeline.php')?>

    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" enctype="multipart/form-data" id="formulaire_inscription">
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_1.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_2.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_3.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_4.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_5.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/createAnnonce.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>