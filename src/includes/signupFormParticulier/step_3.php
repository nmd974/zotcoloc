<!--STEP 3-->
<?php require_once(__ROOT__.'/src/class/Interets.php');?>
<div id="bloc_step_3" class="unshow_step">
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step2">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <!--Alimentaires-->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
            <p class="text-secondary m-0 poppins h5">Mes habitudes alimentaires</p>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="habitudes_alimentaires">
        <?php $interets = Interets::habitudes_alimentaires()?>
        <?php if(!$interets[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($interets[1] as $interet):?>
                <input type="checkbox" name="alimentaire_recap" class="btn-check" id="<?= $interet->id_interet ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

    <!--centres intérêts-->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
            <p class="text-secondary m-0 poppins h5">Mes centres intérêts</p>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="centres_interets">
        <?php $interets = Interets::centres_interets()?>
        <?php if(!$interets[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu ! <?= $interets[1]?></div>
        <?php else :?>
            <?php foreach($interets[1] as $interet):?>
                <input type="checkbox" name="centre_interet_recap" class="btn-check" id="<?= $interet->id_interet ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
    <!--Personnalites-->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
            <p class="text-secondary m-0 poppins h5">Ma personnalité</p>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="personnalite">
        <?php $interets = Interets::personnalite()?>
        <?php if(!$interets[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($interets[1] as $interet):?>
                <input type="checkbox" name="personnalite_recap" class="btn-check" id="<?= $interet->id_interet ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

    <!--Style de vie-->
    <div class="mt-4 mb-4 bg-light">
        <div class="col border-one ps-1">
            <div class="border-two ps-3">
            <p class="text-secondary m-0 poppins h5">Style de vie</p>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="style_vie">
        <?php $interets = Interets::style_vie()?>
        <?php if(!$interets[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($interets[1] as $interet):?>
                <input type="checkbox" name="style_vie_recap" class="btn-check" id="<?= $interet->id_interet ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_4">Suivant</button>
    </div>

</div>