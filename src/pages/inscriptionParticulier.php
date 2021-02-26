<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php
/*
    Amelioration : pour la naviguation une fois le submit on fait afficher le formulaire en entier selon 
    la condition apres le submit et on mets des ancrages dans la timeline afin et on met en rouge celles 
    où il y a une erreur + securité à renforcer

*/
?>

<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">INSCRIPTION</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Etape 1/4:<span class="text-green"> Inscription</span></h2>
            </div>
        </div>
    </div>
</div>

<div class="container" id="wrapper_page_content" style="margin-bottom: 117px;">

    <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/timeline.php')?>

    <!--Verification si erreur-->

    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" enctype="multipart/form-data" id="formulaire_inscription" action="../controllers/utilisateurs/particulier/create.php">
        <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/step_1.php');?>
        <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/step_2.php');?>
        <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/step_3.php');?>
        <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/step_4.php');?>
        <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/step_5.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/signupParticulier.js"></script>
<script src="../js/validator.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>