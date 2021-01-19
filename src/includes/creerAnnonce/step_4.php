<!--STEP 4-->
<?php require_once(__ROOT__.'/src/class/Equipements.php');?>
<div id="bloc_step_4" class="unshow_step">
<div class="arrow_return d-flex align-items-center mb-5" id="back_step4">
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
                    <i class="fa fa-female text-dark" aria-hidden="true"></i>
                    Femme</label>

                    <input type="radio" name="profil" value="eccbc87e4b5ce2fe28308fd9f2a7baf3" id="indifferent" 
                        class="btn-check" <?php if(isset($_POST['profil']) && $_POST['profil'] == "eccbc87e4b5ce2fe28308fd9f2a7baf3"){echo 'checked';}?>
                        >
                    <label class="btn btn-outline-success border-0" for="indifferent">
                    <i class="fa fa-users text-dark" aria-hidden="true"></i>
                    indifférent</label>
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
        </div>
    
    <!--description de la chambre-->
    <div class="col-md-12" id="zoneChambre">

        <h4 class="mb-2">Ajoutez au moins 1 chambre</h4>
        <i class="fa fa-plus-square" aria-hidden="true" id="addChambre"></i>
        <!--Titre de la chambre-->
        <div class="col-md-12">
            <label for="titre_chambre" class="form-label">Titre de la chambre</label>
            <input type="text" class="form-control" id="titre_chambre" name="titre_chambre[]" value="<?php if(isset($_POST['titre_chambre'])){
                echo $_POST['titre_chambre'];
            }?>">
        </div>

        <!--Description de la chambre-->
        <div class="col-md-12">
            <label for="description_chambre" class="form-label">Desciption de la chambre</label>
            <textarea class="form-control" id="description_chambre" name="description_chambre[]" rows="3"  value="<?php if(isset($_POST['description_chambre'])){echo $_POST['description_chambre'];}?>"></textarea>
        </div>

        <!--Surface de la chambre-->
        <div class="col-md-12 input-group mt-3">
            <label for="surface_chambre" class="input-group-text mb-1">Surface Totale</label>
            <input type="number" class="form-control me-5 mb-1" id="surface_chambre" name="surface_chambre_1" value="0">

                <!--Type de chambre-->
            <div class="col-md-12">
                <div class="d-flex align-items-center"> 
                    <p>Type de chambre : </p>
                    <input type="radio" name="type_chambre_1" class="btn-check" id="type_chambre_1_oui" value="Chambre principale">
                            <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_1_oui">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Chambre principale
                        </label>
                        <input type="radio" name="type_chambre_1" class="btn-check" id="type_chambre_1_non" value="Chambre secondaire">
                            <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_1_non">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Chambre secondaire
                        </label>
                </div>  
            </div>
        </div>

        <!--Photo de la chambre-->
        <div class="col-md-12 mt-3">
            <label for="photo_chambre">ajoutez au moins une photo de la chambre</label>
            <input type="file" class="form-control-file" name="photos_chambre_1[]">
        </div>


        <!--a louer ??-->
        <div class="col-md-12">
            <div class="d-flex align-items-center"> 
                <p>Disponible à la location ?</p>
                <input type="radio" name="a_louer_1" class="btn-check" id="a_louer_oui" value="1">
                        <label class="btn btn-outline-success me-2 mb-2" for="a_louer_oui">
                        <i class="fa fa-check" aria-hidden="true"></i>
                            Oui
                    </label>
                    <input type="radio" name="a_louer_1" class="btn-check" id="a_louer_non" value="0">
                        <label class="btn btn-outline-success me-2 mb-2" for="a_louer_non">
                        <i class="fa fa-times" aria-hidden="true"></i>
                            Non
                    </label>
            </div>  
        </div>

        <!--Date disponibilité-->
        <div class="col-md-12 mt-3">
            <label for="date_disponibilite" class="form-label">Date de idsponibilité</label><br>
            <input type="date" name="date_disponibilite[]" class="form-control" id="date_disponibilite"
                value="<?php if(isset($_POST['date_disponibilite'])){echo $_POST['date_disponibilite'];}?>"
            >
        </div>

        <!--Durée du bail-->
        <div class="col-md-12 mt-3">
            <label for="duree_bail" class="form-label">Durée du bail</label>
            <input type="number" class="form-control" id="duree_bail" name="duree_bail[]" placeholder="en mois" value="<?php if(isset($_POST['duree_bail'])){echo $_POST['duree_bail'];}?>">
        </div>

        <!--loyer-->
        <div class="col-md-12 mt-3">
            <label for="loyer" class="form-label">Loyer</label>
            <input type="number" class="form-control" id="loyer" name="loyer[]" placeholder="en €" value="<?php if(isset($_POST['loyer'])){echo $_POST['loyer'];}?>">
        </div>

        <!--charge-->
        <div class="col-md-12 mt-3">
            <label for="charge" class="form-label">Charge</label>
            <input type="number" class="form-control" id="charge" name="charge[]" placeholder="en €" value="<?php if(isset($_POST['charge'])){echo $_POST['charge'];}?>">
        </div>

        <!--caution-->
        <div class="col-md-12 mt-3">
            <label for="caution" class="form-label">Caution</label>
            <input type="number" class="form-control" id="caution" name="caution[]" placeholder="en €" value="<?php if(isset($_POST['caution'])){echo $_POST['caution'];}?>">
        </div>

        <!--frais dossier-->
        <div class="col-md-12 mt-3">
            <label for="frais_dossier" class="form-label">Frais dossier</label>
            <input type="number" class="form-control" id="frais_dossier" name="frais_dossier[]" placeholder="en €" value="<?php if(isset($_POST['frais_dossier'])){echo $_POST['frais_dossier'];}?>">
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
                <input type="checkbox" name="equipements_chambre_1[]" class="btn-check" value="<?= $equipement->id ?>" id="<?= $equipement->id ?>">
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
