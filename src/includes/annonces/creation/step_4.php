<!--STEP 4-->
<div id="bloc_step_4" class="unshow_step">
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step3">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <!--profil colocataire recherché-->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Profil idéal pour cette colocation</p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flex align-items-center mb-3">
            <div>Plutôt:</div>
            <div class="btn" role="group" aria-label="Basic radio toggle button group">
                <input 
                type="radio" 
                name="profil" 
                id="homme" 
                value="c4ca4238a0b923820dcc509a6f75849b" 
                class="btn-check" <?php if(isset($_POST['profil']) && $_POST['profil'] == "c4ca4238a0b923820dcc509a6f75849b"){echo 'checked';}?>
                >
                <label class="btn btn-outline-success border-0" for="homme">
                <i class="fa fa-male text-dark" aria-hidden="true"></i>
                Homme</label>
                
                <input type="radio" name="profil" value="c81e728d9d4c2f636f067f89cc14862c" id="femme" 
                class="btn-check" <?php if(isset($_POST['profil']) && $_POST['profil'] == "c81e728d9d4c2f636f067f89cc14862c"){echo 'checked';}?>
                >
                <label class="btn btn-outline-success border-0" for="femme">
                <i class="fa fa-female text-dark" aria-hidden="true"></i>Femme</label>
                <input type="radio" name="profil" value="eccbc87e4b5ce2fe28308fd9f2a7baf3" id="indifferent" 
                class="btn-check" <?php if(isset($_POST['profil']) && $_POST['profil'] == "eccbc87e4b5ce2fe28308fd9f2a7baf3"){echo 'checked';}?>
                >
                <label class="btn btn-outline-success border-0" for="indifferent">
                <i class="fa fa-users text-dark" aria-hidden="true"></i>
                indifférent
                </label>
            </div>
        </div>
        <div>
            <p>Tranche d'âge:</p>
            <div class="input-group mb-3">
                <div class="input-group">
                    <span class="input-group-text mb-1">Age minimum</span>
                    <input type="number" name="age_min" id="age_min" class="form-control me-5 mb-1" value="<?php if(isset($_POST['age_min'])){echo $_POST['age_min'];}?>">
                    <span class="input-group-text mb-1">Age maximum</span>
                    <input type="number" class="form-control me-5 mb-1" name="age_max" id="age_max"  value="<?php if(isset($_POST['age_max'])){echo $_POST['age_max'];}?>">
                </div>
            </div>
        </div>
        
        <!--button validation inscription-->
        <div class="col-12 text-end my-4">
            <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_5">Suivant</button>
        </div>
    </div>
</div>
            