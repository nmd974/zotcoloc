<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<!-- Gestion de l'inscription -->
<?php

    //On declare le declenchement du traitement
    // if(isset($_POST['ajouter_proprietaire'])){
        
    //     //On défini les id pour le traitement
    //     if(!isset($_POST['id_utilisateur']) && !isset($_POST['id_proprietaire'])){
    //         $_POST['id_utilisateur'] = md5(uniqid(rand(), true));
    //         $_POST['id_proprietaire'] = md5(uniqid(rand(), true));
    //     }

    //     //On lance la fonction associée
    //     $inscriptionValide = ajoutProprietaire($_POST);
    //     if($inscriptionValide[0]){
    //         //Donc on se logged et retour vers creer annonce
    //         $_SESSION['isLoggedIn'] = true;
    //         $_SESSION['role'] = 'proprietaire';
    //         $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
    //         header_remove('Location');
    //         header('Location: ./creationAnnoncePage.php');
    //     }

    // }
?>
<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Authentification</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Création de<span class="text-green"> compte</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex" id="wrapper_page_content">

<div class="form-modal">
<div id="signup-form" class="mb-5">
<a href="./seconnecter.php" class="mt-4 mx-3">J'ai déjà un compte</a>
<?php if(isset($_SESSION['flash'])):?>
    <div class="alert alert-danger mb-2"><?=  $_SESSION['flash'][1] ?></div>
<?php endif;?>

<form method="POST" enctype="multipart/form-data" id="proprietaire_inscription" action="<?php getenv("URL_APP")?>/src/controllers/utilisateurs/proprietaire/create.php">
    <!--Nom-->
    <div class="col-md-12 mb-3">
        <label for="nom_proprietaire" class="form-label">Nom*</label><br>
        <input type="text" name="nom_proprietaire" class="form-control" id="nom_proprietaire" value="<?php if(isset($_POST['nom_proprietaire'])){
            echo $_POST['nom_proprietaire'];
        }?>">
        
    </div>
    <!--Prenom-->
    <div class="col-md-12 mb-3">
        <label for="prenom_proprietaire" class="form-label">Prénom*</label><br>
        <input type="text" name="prenom_proprietaire" class="form-control" id="prenom_proprietaire" value="<?php if(isset($_POST['prenom_proprietaire'])){
            echo $_POST['prenom_proprietaire'];
        }?>">
    </div>
    <!--téléphone-->
    <div class="col-md-12 mb-3">
        <label for="telephone" class="form-label">Téléphone*</label>
        <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php if(isset($_POST['telephone'])){
            echo $_POST['telephone'];
        }?>">
    </div>
    <!--Email-->
    <div class="col-md-12 mb-3">
        <label for="email" class="form-label">Email*</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){
            echo $_POST['email'];
        }?>">
        <em id="valid_email"></em>
    </div>
    <!--mot passe-->
    <div class="col-md-12 mb-3">
        <label for="password" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <!--confirmer mot passe-->
    <div class="col-md-12 mb-3">
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
</form>

</div>

</div>


<script>
// function toggleSignup(){
//    document.getElementById("login-toggle").style.backgroundColor="#fff";
//     document.getElementById("login-toggle").style.color="#222";
//     document.getElementById("signup-toggle").style.backgroundColor="#57b846";
//     document.getElementById("signup-toggle").style.color="#fff";
//     document.getElementById("login-form").style.display="none";
//     document.getElementById("signup-form").style.display="block";
// }

// function toggleLogin(){
//     document.getElementById("login-toggle").style.backgroundColor="#57B846";
//     document.getElementById("login-toggle").style.color="#fff";
//     document.getElementById("signup-toggle").style.backgroundColor="#fff";
//     document.getElementById("signup-toggle").style.color="#222";
//     document.getElementById("signup-form").style.display="none";
//     document.getElementById("login-form").style.display="block";
// }

</script>

   
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/signupProprietaire.js"></script>
<script src="../js/validator.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>