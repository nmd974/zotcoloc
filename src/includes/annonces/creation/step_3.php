<!--STEP 3-->
<div id="bloc_step_3" class="unshow_step">
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step2">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Dites nous en plus sur le logement</p>
                <div class="d-flex align-items-center mt-1">
                    <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                    <div class="text-dark me-3"><small>Quelques informations de plus, aideront vos futur colocataires à anticiper. (Etape optionnelle)</small></div>
                </div>
            </div>
        </div>
    </div>
    <!--Meublé ??-->
    <div class="mt-4 mb-3 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Est-il meublé ?</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4 d-flex align-items-center"> 
        <input type="radio" name="meuble" class="btn-check" id="meuble_oui" value="1">
        <label class="btn btn-outline-success me-2 mb-2" for="meuble_oui">
            <i class="fa fa-check" aria-hidden="true"></i>
            Oui
        </label>
        <input type="radio" name="meuble" class="btn-check" id="meuble_non" value="0">
        <label class="btn btn-outline-success me-2 mb-2" for="meuble_non">
            <i class="fa fa-times" aria-hidden="true"></i>
            Non
        </label>
    </div>  
    <!--Eligible ??-->
    <div class="mt-4 mb-3 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Est-il éligible aux aides logements ?</p>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4 d-flex align-items-center"> 
        <input type="radio" name="aides_logement" class="btn-check" id="aides_logement_oui" value="1">
        <label class="btn btn-outline-success me-2 mb-2" for="aides_logement_oui">
            <i class="fa fa-check" aria-hidden="true"></i>
            Oui
        </label>
        <input type="radio" name="aides_logement" class="btn-check" id="aides_logement_non" value="0">
        <label class="btn btn-outline-success me-2 mb-2" for="aides_logement_non">
            <i class="fa fa-times" aria-hidden="true"></i>
            Non
        </label>
    </div>  
    <div>
        <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Règles du logement</p>
                </div>
            </div>
        </div>
        <!--Régle de vie-->
        <div class="col-md-12">
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="regle_vie">
                <?php if(!$regles[0]):?>
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                <?php foreach($regles as $regle):?>
                <input type="checkbox" name="regles[]" class="btn-check" value="<?= $regle->id?>" id="<?= 'regles_'.$regle->id ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= 'regles_'.$regle->id ?>">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?= $regle->libelle_regle ?>
                </label>
                <?php endforeach; ?>
                <?php endif;?>
            </div>
            <!--Equipement logement-->
            <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Equipements et services du logement</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="equipement_logement">
                <?php if(!$equipements[0]):?>
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                <?php foreach($equipements as $equipement):?>
                <input type="checkbox" name="equipements_logement[]" class="btn-check" value="<?= $equipement->id?>" id="<?= 'equipement_'.$equipement->id ?>">
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



