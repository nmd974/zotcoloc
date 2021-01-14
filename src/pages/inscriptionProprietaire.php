<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<!-- Redirection de l'utilisateur logged -->
<?php
    if($_SESSION['isLoggedIn']){
        header_remove('Location');
        header('Location: ./home.php');
    }
?>
<!-- Gestion de l'inscription -->
<?php
    //On défini les id pour le traitement
    $_POST['id_utilisateur'] = md5(uniqid(rand(), true));
    $_POST['id_proprietaire'] = md5(uniqid(rand(), true));
    //On declare le declenchement du traitement
    if(isset($_POST['ajout_proprietaire'])){
        //On lance la fonction associée
        $inscriptionValide = ajoutProprietaire($_POST);
        if($inscriptionValide[0]){
            //Donc on se logged et retour vers creer annonce
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['role'] = 'proprietaire';
            $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
            header_remove('Location');
            header('Location: ./creationAnnonce.php');
        }

    }
?>
<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">INSCRIPTION</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Etape 1/1:<span class="text-green"> Inscription</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper_page_content">
    <?php if(!$inscriptionValide[0]):?>
        <div class="alert alert-danger mb-2"><?=  $inscriptionValide[1] ?></div>
    <?php endif;?>
    
    <form method="POST" enctype="multipart/form-data" id="formulaire_inscription">
        <?php require_once(dirname(__DIR__).'/includes/signupFormProprietaire/step_1.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>

<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>