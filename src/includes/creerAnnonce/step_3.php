<!--STEP 3-->
<?php require_once(__ROOT__.'/src/class/Regle_vie.php');?>
<?php require_once(__ROOT__.'/src/class/Equipement_logement.php');?>
<div id="bloc_step_3" class="unshow_step">
    <h4 class="mt-3">Dites-nous en plus sur le logement :</h4>

    <!--Meublé ??-->
    <div class="col-md-12">
        <div class="d-flex"> 
            <p>Est-il meublé ?</p>
            <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="meuble" id="meuble" value="true" value="<?php if(isset($_POST['meuble'])){echo $_POST['meuble'];}?>">
                <label class="form-check-label" for="meuble">oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="meuble" id="meuble" value="false" value="<?php if(isset($_POST['meuble'])){echo $_POST['meuble'];}?>">
                <label class="form-check-label" for="meuble">non</label>
            </div>
        </div>  
    </div>

    <!--Eligible ??-->
    <div class="col-md-12">
        <div class="d-flex"> 
            <p>Eligible aides au logements ? ?</p>
            <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="eligible_aide" id="eligible_aide" value="true" value="<?php if(isset($_POST['eligible_aide'])){echo $_POST['eligible_aide'];}?>">
                <label class="form-check-label" for="eligible_aide">APL/ALS</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eligible_aide" id="eligible_aide" value="false" value="<?php if(isset($_POST['eligible_aide'])){echo $_POST['eligible_aide'];}?>">
                <label class="form-check-label" for="eligible_aide">non</label>
            </div>
        </div>  
    </div>

    <div>
        <h4>Détails du logement:</h4>
        <!--Régle de vie-->
        <div class="col-md-12">
            <p>Règles:</p>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="regle_vie">
        <?php $regles = regles::regle_vie()?>
        <?php if(!$regles[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($regles[1] as $regle):?>
                <input type="checkbox" name="regle_vie" class="btn-check" id="<?= $regle->id_regle ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $regle->id_regle ?>">#<?= $regle->libelle_regle ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

            <!--Equipement logement-->
            <p>equipements et services:</p>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="equipement_logement">
        <?php $equipements = Equipements::equipement_logement()?>
        <?php if(!$equipements[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($equipements[1] as $equipement):?>
                <input type="checkbox" name="alimentaire_recap" class="btn-check" id="<?= $equipement->id_equipement ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $equipement->id_equipement ?>">#<?= $equipement->libelle_equipement ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

        </div>
    </div>

   
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_4">Suivant</button>
    </div>

</div>



