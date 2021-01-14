<!--STEP 3-->
<?php require_once(__ROOT__.'/src/class/Regles.php');?>
<?php require_once(__ROOT__.'/src/class/Equipements.php');?>
<div id="bloc_step_3" class="unshow_step">
    <h4 class="mt-3">Dites-nous en plus sur le logement :</h4>

    <!--Meublé ??-->
    <div class="col-md-12">
        <div class="d-flex align-items-center"> 
            <p>Est-il meublé ?</p>
            <input type="radio" name="meuble" class="btn-check" id="meuble_oui">
                    <label class="btn btn-outline-success me-2 mb-2" for="meuble_oui">
                    <i class="fa fa-check" aria-hidden="true"></i>
                        Oui
                </label>
                <input type="radio" name="meuble" class="btn-check" id="meuble_non">
                    <label class="btn btn-outline-success me-2 mb-2" for="meuble_non">
                    <i class="fa fa-times" aria-hidden="true"></i>
                        Non
                </label>
        </div>  
    </div>

    <!--Eligible ??-->
    <div class="col-md-12">
        <div class="d-flex"> 
            <p>Eligible aides au logements ?</p>
            <input type="radio" name="aides_logement" class="btn-check" id="meuble_oui">
                    <label class="btn btn-outline-success me-2 mb-2" for="meuble_oui">
                    <i class="fa fa-check" aria-hidden="true"></i>
                        Oui
                </label>
                <input type="radio" name="aides_logement" class="btn-check" id="meuble_non">
                    <label class="btn btn-outline-success me-2 mb-2" for="meuble_non">
                    <i class="fa fa-times" aria-hidden="true"></i>
                        Non
                </label>
        </div>  
    </div>

    <div>
        <h4>Détails du logement:</h4>
        <!--Régle de vie-->
        <div class="col-md-12">
            <p>Règles:</p>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="regle_vie">
            <?php $regles = Regles::reglesAll()?>
            <?php if(!$regles[0]):?>
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
            <?php else :?>
                <?php foreach($regles[1] as $regle):?>
                    <input type="checkbox" name="regles[]" class="btn-check" id="<?= 'regles_'.$regle->id ?>">
                    <label class="btn btn-outline-success me-2 mb-2" for="<?= 'regles_'.$regle->id ?>">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <?= $regle->libelle_regle ?>
                    </label>
                <?php endforeach; ?>
            <?php endif;?>
        </div>

            <!--Equipement logement-->
            <p>Equipements et services:</p>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="equipement_logement">
                <?php $equipements = Equipements::equipementAll()?>
                <?php if(!$equipements[0]):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($equipements[1] as $equipement):?>
                        <input type="checkbox" name="equipements_logement[]" class="btn-check" id="<?= 'equipement_'.$equipement->id ?>">
                        <label class="btn btn-outline-success me-2 mb-2" for="<?= 'equipement_'.$equipement->id ?>">
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
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_4">Suivant</button>
    </div>

</div>



