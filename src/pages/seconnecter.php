<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Authentification</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Se <span class="text-green"> connecter</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper_page_content" style="height: 61vh;">

<div class="form-modal" >
<a href="./authentificationLoueur.php">Je n'ai pas de compte</a>

<?php if(isset($_SESSION['flash'])):?>
<?php if($_SESSION['flash'][0] == "Success"):?>
<div class="alert alert-success"><?= $_SESSION['flash'][2] ?></div>
<?php else:?>
    <div class="alert alert-danger"><?= $_SESSION['flash'][2] ?></div>
<?php endif;?>
<?php endif;?>

    <div id="login-form">
        <form action="../controllers/utilisateurs/login.php" method="POST">
            <!-- <input type="text" placeholder="Enter email or username"/> -->
            <input type="text" name="email" class="form-control" required
            pattern=" [a-z0-9 ._% + -] + @ [a- z0-9 .-] + \. [az] {2,} $ " 
            placeholder="entrer votre adresse mail"
            value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">


            <!-- <input type="password" placeholder="Enter password"/> -->
            <input type="password" name="password" class="form-control" id="Password" onkeyup="check()" required
            pattern=" ^ (? =. * [az] ) (? =. * [AZ]) (? =. * \ D) (? =. * [@ $!% *? &]) [A-Za-z \ d @ $!% *? &] { 8,} $"
            placeholder="entrer votre votre mot passe" 
            value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>">




            <button type="submit" class="btn login">SE CONNECTER</button>
            <!-- <p><a href="javascript:void(0)">Forgot password</a> </p>
          <p><a href="javascript:void(0)" onclick="toggleSignup()">Register Account</a> </p> -->
          
        </form>
    </div>

    

</div>


<script>
function toggleSignup(){
   document.getElementById("login-toggle").style.backgroundColor="#fff";
    document.getElementById("login-toggle").style.color="#222";
    document.getElementById("signup-toggle").style.backgroundColor="#57b846";
    document.getElementById("signup-toggle").style.color="#fff";
    document.getElementById("login-form").style.display="none";
    document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
    document.getElementById("login-toggle").style.backgroundColor="#57B846";
    document.getElementById("login-toggle").style.color="#fff";
    document.getElementById("signup-toggle").style.backgroundColor="#fff";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("signup-form").style.display="none";
    document.getElementById("login-form").style.display="block";
}

</script>

   
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>