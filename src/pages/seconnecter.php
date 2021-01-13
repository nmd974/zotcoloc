<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>

<section class="container-fluid d-flex" style="height: 60vh;">
    <div class="container mt-2 d-flex justify-content-center">
      <form method="POST">
        <h2 class=" mt-3 mb-5 text-center"> Je me Connecte </h2>

        <div class=" form-group row row-cols-md-2 row-cols-1 pb-4">
          <label for="Email" class="form-label col-sm-2 ">Email address</label>
          <input type="text" name="Email" class="form-control" aria-describedby="emailHelp" required
            pattern=" [a-z0-9 ._% + -] + @ [a- z0-9 .-] + \. [az] {2,} $ " 
            
            value="<?php if(isset($_POST['emailUser'])){
                    echo $_POST['emailUser'];
                }?>"> 


           
        </div>
        <div class="form-group row row-cols-md-2 row-cols-1">
          <label for="Password" class="form-label col-md-3">Password</label>
          <input type="password" class="form-control" id="Password" onkeyup="check()" required
            pattern=" ^ (? =. * [az] ) (? =. * [AZ]) (? =. * \ D) (? =. * [@ $!% *? &]) [A-Za-z \ d @ $!% *? &] { 8,} $">

            value="<?php if(isset($_POST['PasswordUser'])){
                    echo $_POST['PasswordUser'];
                }?>"> 

        </div>
        <div class="form-group d-flex justify-content-end"> <button type="submit"
            class="btn btn-primary mt-5">Connecte</button>
        </div>


      </form>
    </div>
</section>

<?php //require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/sidebar.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>
