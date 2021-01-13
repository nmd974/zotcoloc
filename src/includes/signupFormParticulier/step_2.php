<!--STEP_2-->

<div id="bloc_step_2" class="unshow_step">
<!--Retour button-->
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step1">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <!--Nom-->
    <div class="col-md-12">
        <label for="nom_particulier" class="form-label">Nom*</label><br>
        <input type="text" name="nom_particulier" class="form-control" id="nom_particulier"
            value="<?php if(isset($_POST['nom_particulier'])){echo $_POST['nom_particulier'];}?>"
        >
    </div>
    <!--Prenom-->
    <div class="col-md-12">
        <label for="penom_particulier" class="form-label">Prénom*</label><br>
        <input type="text" name="penom_particulier" class="form-control" id="penom_particulier"
            value="<?php if(isset($_POST['penom_particulier'])){echo $_POST['penom_particulier'];}?>"
        >
    </div>
    <!--Date de naissance-->
    <div class="col-md-12">
        <label for="date_naissance" class="form-label">Date naissance*</label><br>
        <input type="date" name="date_naissance" class="form-control" id="date_naissance"
            value="<?php if(isset($_POST['date_naissance'])){echo $_POST['date_naissance'];}?>"
        >
    </div>
    <!--Date d'emmenagement-->
    <div class="col-md-12">
        <label for="date_disponibilite" class="form-label">Date d'emmenagement*</label><br>
        <input type="date" name="date_disponibilite" class="form-control" id="date_disponibilite"
            value="<?php if(isset($_POST['date_disponibilite'])){echo $_POST['date_disponibilite'];}?>"
        >
    </div>
    <div class="col-md-12 mt-4">
        *Champs obligatoires
    </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_3">Suivant</button>
    </div>
</div>