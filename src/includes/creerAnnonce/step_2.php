<!--STEP_2-->
<form action="" method="POST">
<div id="bloc_step_2" class="unshow_step">
    <h4>Renseignez l'adresse excte de votre logement:</h4>
    <!--ville-->
    <div class="col-md-12">
        <label for="id_ville" class="form-label">Ville*</label><br>
        <input type="text" name="id_ville" class="form-control" id="id_ville" step="1">
    </div>
    <!--Photo-->
    <h4 class="mt-4">Photo des parties communes :</h4> <br>
    <div class="col-md-12 mt-2">
        <label for="photo_logement">ajoutez au moins une photo des parties communes</label>
        <input type="file" class="form-control-file" id="photo_logement" class="photo_logement">
    </div>

    
    
    
    <div class="col-md-12 mt-5">
        *Champs obligatoires
    </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_3">Suivant</button>
    </div>
</div>
</form>