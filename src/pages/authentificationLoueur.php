<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<!-- Gestion de l'inscription -->

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
        <div id="signup-form" class="mb-5 mt-5">
            <?php if(isset($_SESSION['flash'])):?>
            <div class="alert alert-danger mb-2"><?=  $_SESSION['flash'][1] ?></div>
            <?php endif;?>
            <form method="POST" enctype="multipart/form-data" id="proprietaire_inscription" action="<?php getenv("URL_APP")?>/src/controllers/utilisateurs/proprietaire/create.php">
                <!--Nom-->
                <div class="col-md-12 mb-3 mt-5">
                    <label for="nom_proprietaire" class="form-label">Nom*</label><br>
                    <input type="text" name="nom_proprietaire" class="form-control" id="nom_proprietaire" value="<?= $_POST['nom_proprietaire']?: htmlspecialchars($_POST['nom_proprietaire'], ENT_QUOTES);?>">
                </div>
                <!--Prenom-->
                <div class="col-md-12 mb-3">
                    <label for="prenom_proprietaire" class="form-label">Prénom*</label><br>
                    <input type="text" name="prenom_proprietaire" class="form-control" id="prenom_proprietaire" value="<?= $_POST['prenom_proprietaire']?: htmlspecialchars($_POST['prenom_proprietaire'], ENT_QUOTES);?>">
                </div>
                <!--téléphone-->
                <div class="col-md-12 mb-3">
                    <label for="telephone" class="form-label">Téléphone*</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" value="<?= $_POST['telephone']?: htmlspecialchars($_POST['telephone'], ENT_QUOTES);?>">
                </div>
                <!--Email-->
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email']?: htmlspecialchars($_POST['email'], ENT_QUOTES);?>">
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
            <div class="mt-5 d-flex flex-column align-items-center justify-content-center">
                <p>J'ai déjà mon compte !<p>
                <a href="./seconnecter.php" class="mt-4 mx-3">Je me connecte</a>
            </div>
        </div>
    </div>
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/signupProprietaire.js"></script>
<script src="../js/validator.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>