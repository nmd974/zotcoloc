<!--STEP 4-->
<form action="" method="POST">
<div id="bloc_step_4" class="unshow_step">

    <!--profil colocataire recherché-->
    <div class="col-md-12">

        <h4>Quel est le profil idéal pour cette colocation ? :</h4>
            
            <p >Informez les candidatures sur le type de profil que vous recherchez.</p>
            
            <div class="d-flex align-items-end mb-3">
                <p>plutôt:</p>
                
                <div class="btn" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="homme" id="homme" autocomplete="off">
                    <label class="btn btn-outline-primary border-0" for="homme">
                    <i class="fa fa-male text-dark" aria-hidden="true"></i>
                    Homme</label>

                    <input type="radio" class="btn-check" name="femme" id="femme" autocomplete="off">
                    <label class="btn btn-outline-primary border-0" for="femme">
                    <i class="fa fa-female text-dark" aria-hidden="true"></i>
                    Femme</label>

                    <input type="radio" class="btn-check" name="indifferent" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-primary border-0" for="btnradio3">
                    <i class="fa fa-users text-dark" aria-hidden="true"></i>
                    indifférent</label>
                </div>
            </div>

            <div>

                <p>Tranche d'âge:</p>
            
                <div class="input-group mb-3">

                    <div class="input-group">
                        <span class="input-group-text mb-1">Age minimum</span>
                        <input type="text" name class="form-control me-5 mb-1">

                        <span class="input-group-text mb-1">Age maximum</span>
                        <input type="text" aria-label="Last name" class="form-control me-5 mb-1">
                    </div>

                
                
                </div>

            
            </div>

        </div>
    
    <!--description de la chambre-->
    <div class="col-md-12">

        <h4 class="mb-2">La chambre ? :</h4>

        <!--Titre de la chambre-->
        <div class="col-md-12">
            <label for="titre_chambre" class="form-label">Titre de la chambre</label>
            <input type="text" class="form-control" id="titre_chambre" name="titre_chambre" value="<?php if(isset($_POST['titre_chambre'])){
                echo $_POST['titre_chambre'];
            }?>">
        </div>

        <!--Description de la chambre-->
        <div class="col-md-12">
            <label for="description_chambre" class="form-label">Desciption de la chambre</label>
            <textarea class="form-control" id="description_chambre" name="description_chambre" rows="3"></textarea>
        </div>

        <!--Surface de la chambre-->
        <div class="col-md-12 input-group mt-3">
            <label for="surface_chambre" class="input-group-text mb-1">Surface Totale</label>
            <input type="number" class="form-control me-5 mb-1" id="surface_chambre" name="surface_chambre">

            <label class="input-group-text mb-1" for="type_chambre">Type de chambre</label>
            <select class="form-select me-5 mb-1" id="type_chambre" name="type_chambre">
                <option selected>Choose...</option>
                <option value="1">chambre principale</option>
                <option value="2">chambre secondaire</option>
            </select>
        </div>

        <!--Photo de la chambre-->
        <div class="col-md-12 mt-3">
            <label for="photo_chambre">ajoutez au moins une photo de la chambre</label>
            <input type="file" class="form-control-file" id="photo_chambre" class="photo_chambre">
        </div>

        <!--Switch a louer ?-->
        <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" id="a_louer">
            <label class="form-check-label" for="a_louer" name="a_louer">A louer</label>
        </div>

        <!--Date disponibilité-->
        <div class="col-md-12 mt-3">
            <label for="date_disponibilite" class="form-label">Date de idsponibilité</label><br>
            <input type="date" name="date_disponibilite" class="form-control" id="date_disponibilite"
                value="<?php if(isset($_POST['date_disponibilite'])){echo $_POST['date_disponibilite'];}?>"
            >
        </div>

        <!--Durée du bail-->
        <div class="col-md-12 mt-3">
            <label for="duree_bail" class="form-label">Durée du bail</label>
            <input type="number" class="form-control" id="duree_bail" placeholder="en mois">
        </div>

        <!--loyer-->
        <div class="col-md-12 mt-3">
            <label for="loyer" class="form-label">Loyer</label>
            <input type="number" class="form-control" id="loyer" placeholder="en €">
        </div>

        <!--charge-->
        <div class="col-md-12 mt-3">
            <label for="charge" class="form-label">Charge</label>
            <input type="number" class="form-control" id="charge" placeholder="en €">
        </div>

        <!--caution-->
        <div class="col-md-12 mt-3">
            <label for="caution" class="form-label">Caution</label>
            <input type="number" class="form-control" id="caution" placeholder="en €">
        </div>

        <!--frais dossier-->
        <div class="col-md-12 mt-3">
            <label for="frais_dossier" class="form-label">Frais dossier</label>
            <input type="number" class="form-control" id="frais_dossier" placeholder="en €">
        </div>

        <!--equipement chambre-->
        <div class="col-md-12 mt-3">
            <p>equipements privés:</p>
            <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck11">Checkbox 1</label>

                <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck12">Checkbox 2</label>

                <input type="checkbox" class="btn-check" id="btncheck13" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck13">Checkbox 3</label>
            </div>
        </div>
        

    </div>


    
    


    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_5">Suivant</button>
    </div>
</div>
</form>