<!--STEP 4-->
<?php require_once(__ROOT__.'/src/class/Villes.php');?>
<div id="bloc_step_4" class="unshow_step">
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step3">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <!--ville recherche-->

    <div class="d-flex flex-wrap interets_particulier align-items-stretch" role="group" aria-label="Basic checkbox toggle button group">
        <?php $villes = Villes::villesAll()?>
        <?php if(!$villes[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($villes[1] as $ville):?>
                <input type="checkbox"name="ville" class="btn-check" id="<?= 'ville_'.$ville->id ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= 'ville_'.$ville->id ?>"><?= $ville->libelle_ville ?></label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="submit" class="btn w-25 bg-green text-white mr-5" id="step_5">Suivant</button>
    </div>
</div>