<!--STEP 1-->
<div id="bloc_step_1" class="    
    <?php if((isset($validationInscription) && !$validationInscription[0] && ($validationInscription[2] == 1 || $validationInscription[2] == 0)) || !isset($validationInscription)){
            echo 'show_step';
        }else{
            echo 'unshow_step';
    }?>"
>
    <!--Verification si erreur-->
    <?php if(isset($validationInscription) && !$validationInscription[0] && $validationInscription[2] == 1):?>
        <div class="alert alert-danger mb-2"><?=  $validationInscription[1] ?></div>
    <?php endif;?>

    <div class="col-md-12">
        <label for="email" class="form-label">Email*</label>
        <input 
            type="email" 
            class="form-control"
            id="email" 
            name="email" 
            value="<?php if(isset($_POST['email'])){
                echo $_POST['email'];
            }?>"
        >
    </div>
    <div class="col-md-12">
        <label for="password" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="password" name="password" 
            value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>"
        >
    </div>
    <div class="col-md-12">
        <label for="confirm_password" class="form-label">Confirmer mot de passe*</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
    </div>
    <div class="col-md-12 mt-4">
        *Champs obligatoires
    </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="submit" class="btn w-25 bg-green text-white mr-5" name="submit_step1" id="step_2">Suivant</button>
    </div>
</div>