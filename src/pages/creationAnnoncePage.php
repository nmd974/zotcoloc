<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/controllers/annonces/creation/getData.php');?>

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

    <?php require_once(dirname(__DIR__).'/includes/annonces/creation/timeline.php')?>

<?php if(isset($_SESSION['flash'])):?>
<?php if($_SESSION['flash'][0] == "Success"):?>
<div class="alert alert-success mt-3"><?= $_SESSION['flash'][2] ?></div>

<?php else:?>
    <div class="alert alert-danger mt-3"><?= $_SESSION['flash'][2] ?></div>
<?php endif;?>
<?php endif;?>
    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" class="mt-3" enctype="multipart/form-data" id="create_annonce" action="../controllers/annonces/creation/create.php">
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_1.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_2.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_3.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_4.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_5.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/createAnnonce.js"></script>
<script src="../js/validator.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>