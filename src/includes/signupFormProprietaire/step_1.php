
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
        <button type="submit" class="btn w-55 bg-green text-white mr-5" name="ajouter_proprietaire">Je m'inscris</button>
    </div>
</div>