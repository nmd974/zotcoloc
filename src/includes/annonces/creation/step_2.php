<!--STEP_2-->
<div id="bloc_step_2" class="unshow_step">  
    <!--Retour button-->
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step1">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <!-- <h4>Renseignez l'adresse excte de votre logement:</h4> -->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Sélectionnez la ville de votre logement <span class="text-danger">*</span></p>
            </div>
        </div>
    </div>
    
    <!--ville-->
    <!-- Amelioration : Faire avec ajax une generation des adresses selon ce qui saisie en lien avec api region reunion https://data.regionreunion.com/explore/dataset/ban-lareunion/api/-->
    
    <div class="d-flex flex-wrap ville_ajax align-items-stretch" role="group" aria-label="Basic checkbox toggle button group">
        <?php if(!$villes[0]):?>
        <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
        <?php foreach($villes as $ville):?>
        <input 
        type="radio"
        name="ville" 
        class="btn-check" 
        id="<?= 'ville_'.$ville->id ?>" 
        value="<?= $ville->id ?>"
        <?php if(isset($_POST['ville'])){if(in_array($ville->id, $_POST['ville'])){echo 'checked';}}?>
        >
        <label class="btn btn-outline-success me-2 mb-2" for="<?= 'ville_'.$ville->id ?>">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            <?= $ville->libelle_ville ?>
        </label>
        <?php endforeach; ?>
        <?php endif;?>
    </div>
    
    <!--Photo-->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Photos des parties communes <span class="text-danger">*</span></p>
            </div>
        </div>
    </div>
    
    <input type="file" class="form-control" name="photos_logement[]" id="photos_logement" multiple required>
    <div class="invalid-feedback">Veuillez sélectionner au moins 1 photo du logement (6 photos maximum)</div>
    
    
    <div class="col-md-12 mt-5">
        *Champs obligatoires
    </div>
    
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_3">Suivant</button>
    </div>
</div>