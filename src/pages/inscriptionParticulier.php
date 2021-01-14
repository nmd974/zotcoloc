<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php //require_once(dirname(__DIR__).'/controllers/signupParticulier.php');?>
<?php require_once(dirname(__DIR__).'/controllers/signupParticulier.php');?>


<?php

/*
    Amelioration : pour la naviguation une fois le submit on fait afficher le formulaire en entier selon 
    la condition apres le submit et on mets des ancrages dans la timeline afin et on met en rouge celles 
    où il y a une erreur + securité à renforcer

*/
    if(isset($_POST['ajouter'])){
        //Ici on détermine avant le lancement un POST id afin que l'id reste le meme en cas d'erreur dans l'ajout en bdd
        if(!isset($_POST['id_utilisateur']) && !isset($_POST['id_particulier'])){
            $_POST['id_utilisateur'] = md5(uniqid(rand(), true));
            $_POST['id_particulier'] = md5(uniqid(rand(), true));
        }
        $validationInscription = validation($_POST);
        if($validationInscription[0]){
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['role'] = "particulier";
            $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
            header_remove('Location');
            header('Location: ./home.php');
        }
    }
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

<div class="container" id="wrapper_page_content">

    <?php require_once(dirname(__DIR__).'/includes/signupFormParticulier/timeline.php')?>

    <!--Verification si erreur-->
    <?php if(isset($validationInscription) && !$validationInscription[0] && $validationInscription[2] == 0):?>
        <div class="alert alert-danger mb-2"><?=  $validationInscription[1] ?></div>
    <?php endif;?>

    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" enctype="multipart/form-data" id="formulaire_inscription">
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0-0/axios.min.js"></script> -->
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>