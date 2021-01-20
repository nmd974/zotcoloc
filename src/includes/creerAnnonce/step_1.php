<!--STEP 1-->
<!-- Charger les infos du profil (photos, favoris, candidature, publications)-->
<div id="bloc_step_1" class="show_step">

        <!--Titre-->
        <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Dites-en plus sur votre logement</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-floating">
                <input type="text" placeholder="Un titre accrocheur attirera l'oeil" class="form-control" maxlength="100" id="titre_logement" name="titre_logement" required value="<?php if(isset($_POST['titre_logement'])){echo $_POST['titre_logement'];}?>">
                <label for="titre_logement" class="form-label">Titre <span class="text-danger">*</span></label>
            </div>
            <div class="d-flex align-items-center mt-1">
                <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                <div class="text-dark me-3"><small>Par exemple : Magnifique T2 à la Bretagne avec jardin, proche technopole</small></div>
                <div class="text-dark" id="nb_caracteres"><small>0/100 caractères</small></div>
            </div>
        </div>

        <!--Description-->
        <div class="col-md-12 mb-4">
            <div class="form-floating">
                <textarea class="form-control" name="description_logement" required placeholder="Une description précise vous donnera plus de change de trouver un colocataire" id="description_logement" style="height: 100px"><?php if(isset($_POST['description_logement'])){echo $_POST['description_logement'];}?></textarea>
                <label for="description_logement">Desciption du logement <span class="text-danger">*</span></label>
            </div>
            <div class="d-flex align-items-center mt-1">
                <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                <div class="text-dark me-3"><small>C'est le moment de mettre en avant tous les points forts et spécificités de votre logement : locataires actuels, ambiance, vie de quartier, transports en commun et accès</small></div>
            </div>
        </div>

        <!--Type-->
        <!-- Amelioration : Faire un chargement de requete des types en cas de changement par admin pour avoir les dernieres nouveautes-->
        <div class="col-md-12 mb-4">
            <div class="form-floating">
                <select class="form-select" id="type_logement" name="type_logement" value="<?php if(isset($_POST['type_logement'])){echo $_POST['type_logement'];}?>">
                    <option value="Appartement" selected>Appartement</option>
                    <option value="Villa">Villa</option>
                    <option value="Maison">Maison</option>
                </select>
                <label for="type_logement">Type de logement</label>
            </div>
        </div>

        <!--Surface-->
        <div class="col-md-12">
            <div class="form-floating">
                <input type="number" placeholder="Surface de votre logement en m2" class="form-control" min="0" id="surface_logement" name="surface_logement" required value="<?php if(isset($_POST['surface_logement'])){echo $_POST['surface_logement'];}?>">
                <label for="surface_logement" class="form-label">Surface du logement en m2</label>
            </div>
        </div>

        <div class="col-md-12 mt-4 text-danger">
            *Champs obligatoires
        </div>
        <!--button validation inscription-->
        <div class="col-12 text-end my-4">
            <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_2">Suivant</button>
        </div>
</div>
