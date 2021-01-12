<!--STEP 5-->
<div id="bloc_step_5" class="unshow_step">
    <div class="col-md-12">
        <label for="name" class="form-label">Nom*</label>
        <input type="text" class="form-control" name="nomUser" id="name" value="<?php if(isset($_POST['nomUser'])){
            echo $_POST['nomUser'];
        }?>">
    </div>

    <div class="col-md-12">
        <label for="prenom" class="form-label">Prénoms*</label>
        <input type="text" class="form-control" name="prenomUser" id="prenom" value="<?php if(isset($_POST['prenomUser'])){
            echo $_POST['prenomUser'];
        }?>">
    </div>

    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email*</label>
        <input type="email" class="form-control" id="inputEmail4" name="emailUser" value="<?php if(isset($_POST['emailUser'])){
            echo $_POST['emailUser'];
        }?>">
    </div>

    <!-- date naissance-->
    <div class="col-md-12">
        <label for="anniversaire" class="form-label">Date naissance*</label><br>
        <input type="date" name="timestamp" class="form-control" step="1">
    </div>

    <!-- Emmenagement-->
    <div class="col-md-12">
        <label for="emmenagement" class="form-label">Date d'emmenagement*</label><br>
        <input type="date" name="timestamp" class="form-control" step="1">
    </div>



    <!--Alimentaires-->

    <div class="mt-4">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <h2 class="vidaloka m-0 h1">Mes habitudes <span class="text-green">
                alimenatries</span> :</h2>
            </div>
        </div>
    </div>

    <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck1">Checkbox 1</label>

        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck2">Checkbox 2</label>
    </div>

    <!--centres intérêts-->
    <div class="mt-4">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <h2 class="vidaloka m-0 h1">Mes centres <span class="text-green">
                intérêts</span> :</h2>
            </div>
        </div>
    </div>

    <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
        <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck11">Checkbox 1</label>

        <input type="checkbox" class="btn-check" id="btncheck22" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck22">Checkbox 2</label>
    </div>

    <!--Personnalites-->
    <div class="mt-4">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <h2 class="vidaloka m-0 h1">Ma <span class="text-green">
                personnalite</span> :</h2>
            </div>
        </div>
    </div>

    <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
        <input type="checkbox" class="btn-check" id="btncheck31" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck31">Checkbox 1</label>

        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck32">Checkbox 2</label>
    </div>

    <!--Style de vie-->
    <div class="mt-4">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <h2 class="vidaloka m-0 h1">Styl de <span class="text-green">vie</span> :</h2>
            </div>
        </div>
    </div>

    <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck1">Checkbox 1</label>

        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btncheck2">Checkbox 2</label>
    </div>

    <div class="col-md-12 mt-4">
        *Champs obligatoires
    </div>

    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_5">Suivant</button>
    </div>

    <!-- CheckBox -->
    <div class="col-md-12">
        <p> 
            <input name="AgreeCheckbox" id="agree" type="checkbox" value="AGREE"> 
            J'accepte que les informations saisies ci-dessus soient correctes. Ce n'est peut-être pas le cas. C'est juste pour s'amuser.
        </p>
    </div>

</div>