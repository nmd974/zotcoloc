<!--STEP 1-->

<div id="bloc_step_1" class="show_step">
    <h4>Dites-en plus sur votre logement:</h4>

        <!--Titre-->
        <div class="col-md-12">
            <label for="titre_logement" class="form-label">Titre*</label>
            <input type="text" class="form-control" max="100" id="titre_logement" name="titre_logement" value="<?php if(isset($_POST['titre_logement'])){
                echo $_POST['titre_logement'];
            }?>">
        </div>

        <!--Description-->
        <div class="col-md-12">
            <label for="description_logement" class="form-label">Desciption du logement*</label>
            <textarea class="form-control" id="description_logement" name="description_logement" rows="3"></textarea 
            value="<?php if(isset($_POST['description_logement'])){echo $_POST['description_logement'];}?>">
        </div>

        <!--Type-->
        <!-- Amelioration : Faire un chargement de requete des types en cas de changement par admin pour avoir les dernieres nouveautes-->
        <div class="col-md-12">
            <label for="type_logement">Type de logement</label>
            <select class="form-control" name="type_logement" id="type_logement" value="<?php if(isset($_POST['type_logement'])){echo $_POST['type_logement'];}?>">
                <option value="1">Villa</option>
                <option value="2">Appartement</option>
                <option value="3">Maison</option>
            </select>
        </div>

        <!--Surface-->
        <div class="col-md-12">
            <label for="surface_logement" class="form-label">Surface Totale</label>
            <input type="number" class="form-control" id="surface_logement" name="surface_logement" value="<?php if(isset($_POST['surface_logement'])){echo $_POST['surface_logement'];}?>">
        </div>

        <div class="col-md-12 mt-4">
            *Champs obligatoires
        </div>
        <!--button validation inscription-->
        <div class="col-12 text-end my-4">
            <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_2">Suivant</button>
        </div>
</div>
