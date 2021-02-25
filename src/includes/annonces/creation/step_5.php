<!--STEP 5-->

<?php 
    // session_start();
    // var_dump($_SESSION['liste_interets']);
    // var_dump($_POST);
?>

<div id="bloc_step_5" class="unshow_step">
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step4">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>

            <!--Infos générales-->
        <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Description du logement</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex" id="titre_logement_recap">
            <p class="me-3">Titre :</p>
                <?php if(isset($_POST['titre_logement'])):?>
                    <p> <?= $_POST['titre_logement']?> </p>
                <?php endif; ?>
        </div>
        <div class="col-md-12 d-flex" id="description_logement_recap">
            <p class="me-3">Description :</p>
                <?php if(isset($_POST['description_logement'])):?>
                    <p> <?= $_POST['description_logement']?> </p>
                <?php endif; ?>
        </div>
        <div class="col-md-12 d-flex" id="type_logement_recap">
            <p class="me-3">Type de logement :</p>
                <?php if(isset($_POST['type_logement'])):?>
                    <p> <?= $_POST['type_logement']?> </p>
                <?php endif; ?>
        </div>
        <div class="col-md-12 d-flex" id="surface_logement_recap">
            <p class="me-3">Surface totale (m²):</p>
                <?php if(isset($_POST['type_logement'])):?>
                    <p> <?= $_POST['type_logement']?> </p>
                <?php endif;?>
        </div>
    
     <!-- Ville -->
     <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Ville</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex" id="ville_recap">
            <p class="me-3">Titre :</p>
                <?php if(isset($_POST['ville'])):?>
                    <p> <?= $_POST['ville']?> </p>
                <?php endif; ?>
        </div>

     <!-- Details logement -->
     <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Détails logement</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex" id="meuble_recap">
            <p class="me-3">Meublé :</p>
                <?php if(isset($_POST['meuble'])):?>
                    <p> <?= $_POST['meuble']?> </p>
                <?php endif; ?>
        </div>
        <div class="col-md-12 d-flex" id="aides_logement_recap">
            <p class="me-3">Eligibles aides au logement :</p>
                <?php if(isset($_POST['aides_logement'])):?>
                    <p> <?= $_POST['aides_logement']?> </p>
                <?php endif; ?>
        </div>
             <!-- Regles logement -->
     <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Règles du logement</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex" id="regles_recap">
            <p class="me-3">Règles :</p>
                <?php if(isset($_POST['regles'])):?>
                    <?php foreach($_POST['regles'] as $regle):?>
                    <p> #<?= $regle ?> </p>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p> Non renseigné </p>
                <?php endif; ?>
        </div>
             <!-- Equipements logement -->
             <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Equipements du logement</p>
                    </div>
                </div>
            </div>
        <div class="col-md-12 d-flex" id="equipements_logement">
            <p class="me-3">Equipements :</p>
                <?php if(isset($_POST['equipements_logement'])):?>
                    <?php foreach($_POST['equipements_logement'] as $equipement):?>
                    <p> #<?= $equipement ?> </p>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p> Non renseigné </p>
                <?php endif; ?>
        </div>

     <!-- Profil logement -->
     <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Profil recherché</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex">
            <p class="me-3">Type :</p>
                <?php if(isset($_POST['profil'])):?>
                    <p> <?= $_POST['profil']?> </p>
                        <?php else: ?>
                    <p> Non renseigné </p>
                <?php endif; ?>
        </div>
        <div class="col-md-12 d-flex">
            <p class="me-3">Age minimum :</p>
                <?php if(isset($_POST['age_min'])):?>
                    <p> <?= $_POST['age_min']?> </p>
                        <?php else: ?>
                    <p> Non renseigné </p>
                <?php endif; ?>
        </div>
        <div class="col-md-12 d-flex">
            <p class="me-3">Age maximum :</p>
                <?php if(isset($_POST['age_max'])):?>
                    <p> <?= $_POST['age_max']?> </p>
                        <?php else: ?>
                    <p> Non renseigné </p>
                <?php endif; ?>
        </div>
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="submit" class="btn w-25 bg-green text-white mr-5" name="enregistrer_annonce">J'enregistre l'annonce</button>
    </div>


</div>