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
    // $_POST['id_utilisateur'] = md5(uniqid(rand(), true));
    // $_POST['id_proprietaire'] = md5(uniqid(rand(), true));
    // //On declare le declenchement du traitement
    // if(isset($_POST['ajout_proprietaire'])){
    //     //On lance la fonction associée
    //     $inscriptionValide = ajoutProprietaire($_POST);
    //     if($inscriptionValide[0]){
    //         //Donc on se logged et retour vers creer annonce
    //         $_SESSION['isLoggedIn'] = true;
    //         $_SESSION['role'] = 'proprietaire';
    //         $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
    //         header_remove('Location');
    //         header('Location: ./creationAnnonce.php');
    //     }

    // }
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
    
    <form method="POST" enctype="multipart/form-data" id="proprietaire_inscription">
        
<!--STEP 1-->
<div class="show_step">
    <!--Nom-->
    <div class="col-md-12">
        <label for="nom_proprietaire" class="form-label">Nom*</label><br>
        <input type="text" name="nom_proprietaire" class="form-control" id="nom_proprietaire" value="<?php if(isset($_POST['nom_proprietaire'])){
            echo $_POST['nom_proprietaire'];
        }?>">
        
    </div>
    <!--Prenom-->
    <div class="col-md-12">
        <label for="prenom_proprietaire" class="form-label">Prénom*</label><br>
        <input type="text" name="prenom_proprietaire" class="form-control" id="prenom_proprietaire" value="<?php if(isset($_POST['prenom_proprietaire'])){
            echo $_POST['prenom_proprietaire'];
        }?>">
    </div>
    <!--téléphone-->
    <div class="col-md-12">
        <label for="telephone" class="form-label">Téléphone*</label>
        <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php if(isset($_POST['telephone'])){
            echo $_POST['telephone'];
        }?>">
    </div>
    <!--Email-->
    <div class="col-md-12">
        <label for="email" class="form-label">Email*</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){
            echo $_POST['email'];
        }?>">
        <em id="valid_email"></em>
    </div>
    <!--mot passe-->
    <div class="col-md-12">
        <label for="password" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <!--confirmer mot passe-->
    <div class="col-md-12">
        <label for="confirm_password" class="form-label">Confirmer le mot de passe*</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
    </div>
    <div class="col-md-12 mt-4">
        *Champs obligatoires
    </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="submit" class="btn w-55 bg-green text-white mr-5" id="ajouter_proprietaire" name="ajouter_proprietaire">Je m'inscris</button>
    </div>
</div>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/signupProprietaire.js"></script>
<script src="../js/validator.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>