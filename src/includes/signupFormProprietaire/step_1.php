<!--STEP 1-->
<div id="bloc_step_1" class="show_step">
    <!--Nom-->
    <div class="col-md-12">
        <label for="nom" class="form-label">Nom*</label><br>
        <input type="text" name="nom" class="form-control" id="nom" step="1">
    </div>
    <!--Prenom-->
    <div class="col-md-12">
        <label for="penom" class="form-label">Prénom*</label><br>
        <input type="text" name="prenom" class="form-control" id="prenom" step="1">
    </div>
    <!--téléphone-->
    <div class="col-md-12">
        <label for="inputTelephone" class="form-label">Téléphone*</label>
        <input type="tel" class="form-control" id="inputTelephone" name="telephonelUser" value="<?php if(isset($_POST['telephoneUser'])){
            echo $_POST['telephoneUser'];
        }?>">
    </div>
    <!--Email-->
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email*</label>
        <input type="email" class="form-control" id="inputEmail4" name="emailUser" value="<?php if(isset($_POST['emailUser'])){
            echo $_POST['emailUser'];
        }?>">
    </div>
    <!--mot passe-->
    <div class="col-md-12">
        <label for="confirmPassword" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="confirmPassword" name="passwordUser">
    </div>
    <!--confirmer mot passe-->
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Retaper Mot de passe*</label>
        <input type="password" class="form-control" id="inputPassword4" name="repass">
    </div>
    <div class="col-md-12 mt-4">
        *Champs obligatoires
    </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_2">Valider</button>
    </div>
</div>