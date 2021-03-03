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
<style>
.form-modal{
position: relative;
    width:450px;
    height:auto;
    margin-top:4em;
    left:50%;
    transform:translateX(-50%);
    background:#fff;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
    box-shadow:0 3px 20px 0px rgba(0, 0, 0, 25%)
}

.form-modal button{
    cursor: pointer;
    position: relative;
    text-transform: capitalize;
    font-size:1em;
    z-index: 2;
    outline: none;
    background:#fff;
    transition:0.2s;
}

.form-modal .btn{
    border-radius: 5px;
    border:none;
    font-weight: bold;
    font-size:1.2em;
    padding:0.8em 1em 0.8em 1em!important;
    transition:0.5s;
    border:1px solid #ebebeb;
    margin-bottom:0.5em;
    margin-top:0.5em;
}

.form-modal .login , .form-modal .signup{
    background:#57b846;
    color:#fff;
}

.form-modal .login:hover , .form-modal .signup:hover{
    background:#222;
}

.form-toggle{
    position: relative;
    width:100%;
    height:auto;
}

.form-toggle button{
    width:50%;
    float:left;
    padding:1.5em;
    margin-bottom:1.5em;
    border:none;
    transition: 0.2s;
    font-size:1.1em;
    font-weight: bold;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
}

.form-toggle button:nth-child(1){
    border-bottom-right-radius: 5px;
}

.form-toggle button:nth-child(2){
    border-bottom-left-radius: 5px;
}

#login-toggle{
    background:#57b846;
    color:#ffff;
}

.form-modal form{
    position: relative;
    width:90%;
    height:auto;
    left:50%;
    transform:translateX(-50%);  
}

#login-form button , #signup-form button{
    width:100%;
    margin-top:0.5em;
    padding:0.6em;
}

.form-modal input{
    position: relative;
    width:100%;
    font-size:1em;
    padding:1.2em 1.7em 1.2em 1.7em;
    margin-top:0.6em;
    margin-bottom:0.6em;
    border-radius: 5px;
    border:none;
    background:#ebebeb;
    outline:none;
    font-weight: bold;
    transition:0.4s;
}

.form-modal input:focus , .form-modal input:active{
    transform:scaleX(1.02);
}

.form-modal input::-webkit-input-placeholder{
    color:#222;
}


.form-modal p{
    font-size:16px;
    font-weight: bold;
}

.form-modal p a{
    color:#57b846;
    text-decoration: none;
    transition:0.2s;
}

.form-modal p a:hover{
    color:#222;
}


.form-modal i {
    position: absolute;
    left:10%;
    top:50%;
    transform:translateX(-10%) translateY(-50%); 
}

.fa-google{
    color:#dd4b39;
}

.fa-linkedin{
    color:#3b5998;
}

.fa-windows{
    color:#0072c6;
}

.-box-sd-effect:hover{
    box-shadow: 0 4px 8px hsla(210,2%,84%,.2);
}

@media only screen and (max-width:500px){
    .form-modal{
        width:100%;
    }
}

@media only screen and (max-width:400px){
    i{
        display: none!important;
    }
}
</style>

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