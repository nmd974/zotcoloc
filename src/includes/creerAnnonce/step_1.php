<!--STEP 1-->
<div id="bloc_step_1" class="show_step">
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email*</label>
        <input type="email" class="form-control" id="inputEmail4" name="emailUser" value="<?php if(isset($_POST['emailUser'])){
            echo $_POST['emailUser'];
        }?>">
    </div>
    <div class="col-md-12">
        <label for="confirmPassword" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="confirmPassword" name="passwordUser">
    </div>
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Retaper Mot de passe*</label>
        <input type="password" class="form-control" id="inputPassword4" name="repass">
    </div>
    <div class="col-md-12 mt-4">
        *Champs obligatoires
    </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_2">Suivant</button>
    </div>
</div>