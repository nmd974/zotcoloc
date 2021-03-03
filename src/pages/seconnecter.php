<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<div class="container">
    <div class="subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Authentification</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Se <span class="text-green"> connecter</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper_page_content">
    <div class="form-modal" >
        <?php if(isset($_SESSION['flash'])):?>
        <?php if($_SESSION['flash'][0] == "Success"):?>
        <div class="alert alert-success"><?= $_SESSION['flash'][2] ?></div>
        <?php else:?>
        <div class="alert alert-danger"><?= $_SESSION['flash'][2] ?></div>
        <?php endif;?>
        <?php endif;?>
        <div id="login-form">
            <form action="../controllers/utilisateurs/login.php" method="POST" id="loginPage">
                <input type="text" name="email" class="form-control" required
                pattern=" [a-z0-9 ._% + -] + @ [a- z0-9 .-] + \. [az] {2,} $ " 
                placeholder="entrer votre adresse mail"
                value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['email'], ENT_QUOTES);}?>">
                
                <input type="password" name="password" class="form-control" id="Password" required
                pattern=" ^ (? =. * [az] ) (? =. * [AZ]) (? =. * \ D) (? =. * [@ $!% *? &]) [A-Za-z \ d @ $!% *? &] { 8,} $"
                placeholder="entrer votre votre mot passe" 
                >
                <button type="submit" class="btn login">SE CONNECTER</button>          
            </form>
            <div class="mt-5 d-flex flex-column align-items-center justify-content-center">
                <p>Pas encore inscrits ?<p>
                    <div><a href="./inscriptionParticulier.php">Créer mon compte colocataire</a></div>
                
                <div><a href="./authentificationLoueur.php">Créer mon compte propriétaire</a></div>
                <?php var_dump($_SERVER);?>
            </div>
        </div>
    </div>
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/validator.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>