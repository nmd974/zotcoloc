<!--STEP 4-->
<?php require_once(__ROOT__.'/src/class/Equipements.php');?>
<div id="bloc_step_4" class="unshow_step">

    <!--profil colocataire recherché-->
    <div class="col-md-12">

        <h4>Quel est le profil idéal pour cette colocation ? :</h4>
            
            <p >Informez les candidatures sur le type de profil que vous recherchez.</p>
            
            <div class="d-flex align-items-end mb-3">
                <p>plutôt:</p>
                
                <div class="btn" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="homme" id="homme" autocomplete="off" value="<?php if(isset($_POST['homme'])){echo $_POST['homme'];}?>">
                    <label class="btn btn-outline-primary border-0" for="homme">
                    <i class="fa fa-male text-dark" aria-hidden="true"></i>
                    Homme</label>

                    <input type="radio" class="btn-check" name="femme" id="femme" autocomplete="off" value="<?php if(isset($_POST['femme'])){echo $_POST['femme'];}?>">
                    <label class="btn btn-outline-primary border-0" for="femme">
                    <i class="fa fa-female text-dark" aria-hidden="true"></i>
                    Femme</label>

                    <input type="radio" class="btn-check" name="indifferent" id="indifferent" autocomplete="off" value="<?php if(isset($_POST['indifferent'])){echo $_POST['indifferent'];}?>">
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
                        <input type="text" name="age_min" id="age_min" class="form-control me-5 mb-1" value="<?php if(isset($_POST['age_min'])){echo $_POST['age_min'];}?>">

                        <span class="input-group-text mb-1">Age maximum</span>
                        <input type="text" class="form-control me-5 mb-1" name="age_max" id="age_max"  value="<?php if(isset($_POST['age_max'])){echo $_POST['age_max'];}?>">
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
            <textarea class="form-control" id="description_chambre" name="description_chambre" rows="3"  value="<?php if(isset($_POST['description_chambre'])){echo $_POST['description_chambre'];}?>"></textarea>
        </div>

        <!--Surface de la chambre-->
        <div class="col-md-12 input-group mt-3">
            <label for="surface_chambre" class="input-group-text mb-1">Surface Totale</label>
            <input type="number" class="form-control me-5 mb-1" id="surface_chambre" name="surface_chambre" value="<?php if(isset($_POST['surface_chambre'])){echo $_POST['surface_chambre'];}?>">

            <label class="input-group-text mb-1" for="type_chambre">Type de chambre</label>
            <select class="form-select me-5 mb-1" id="type_chambre" name="type_chambre" value="<?php if(isset($_POST['type_chambre'])){echo $_POST['type_chambre'];}?>">
                <option selected>Choose...</option>
                <option value="1">chambre principale</option>
                <option value="2">chambre secondaire</option>
            </select>
        </div>

        <!--Photo de la chambre-->
        <div class="col-md-12 mt-3">
            <label for="photo_chambre">ajoutez au moins une photo de la chambre</label>
            <input type="file" class="form-control-file" id="photo_chambre" class="photo_chambre" value="<?php if(isset($_POST['photo_chambre'])){echo $_POST['photo_chambre'];}?>">
        </div>

        <!--Switch a louer ?-->
        <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="checkbox" id="a_louer" value="<?php if(isset($_POST['a_louer'])){echo $_POST['a_louer'];}?>">
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
            <input type="number" class="form-control" id="duree_bail" name="duree_bail" placeholder="en mois" value="<?php if(isset($_POST['duree_bail'])){echo $_POST['duree_bail'];}?>">
        </div>

        <!--loyer-->
        <div class="col-md-12 mt-3">
            <label for="loyer" class="form-label">Loyer</label>
            <input type="number" class="form-control" id="loyer" name="loyer" placeholder="en €" value="<?php if(isset($_POST['loyer'])){echo $_POST['loyer'];}?>">
        </div>

        <!--charge-->
        <div class="col-md-12 mt-3">
            <label for="charge" class="form-label">Charge</label>
            <input type="number" class="form-control" id="charge" name="charge" placeholder="en €" value="<?php if(isset($_POST['charge'])){echo $_POST['charge'];}?>">
        </div>

        <!--caution-->
        <div class="col-md-12 mt-3">
            <label for="caution" class="form-label">Caution</label>
            <input type="number" class="form-control" id="caution" name="caution" placeholder="en €" value="<?php if(isset($_POST['caution'])){echo $_POST['caution'];}?>">
        </div>

        <!--frais dossier-->
        <div class="col-md-12 mt-3">
            <label for="frais_dossier" class="form-label">Frais dossier</label>
            <input type="number" class="form-control" id="frais_dossier" name="frais_dossier" placeholder="en €" value="<?php if(isset($_POST['frais_dossier'])){echo $_POST['frais_dossier'];}?>">
        </div>

        <!--equipement chambre-->
        <div class="col-md-12 mt-3">
            <p>Equipements privés:</p>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="equipement_prive">
        <?php $equipements = Equipements::equipementAll()?>
        <?php if(!$equipements[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($equipements[1] as $equipement):?>
                <input type="checkbox" name="equipements_chambre_1[]" class="btn-check" id="<?= $equipement->id ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $equipement->id ?>">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?= $equipement->libelle_equipement ?>
                </label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
        </div>
        

    </div>


    
    


    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_5">Suivant</button>
    </div>
</div>
