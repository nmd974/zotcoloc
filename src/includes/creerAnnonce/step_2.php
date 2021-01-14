<!--STEP_2-->
<?php require_once(dirname(dirname(__DIR__)).'/class/Villes.php');?>

<!-- <form action="" method="POST"> -->
<div id="bloc_step_2" class="unshow_step">
<!--Retour button-->
<div class="arrow_return d-flex align-items-center mb-5" id="back_step1">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <!-- <h4>Renseignez l'adresse excte de votre logement:</h4> -->
    <h4>Sélectionnez la ville de votre logement</h4>

    <!--ville-->
    <!-- Amelioration : Faire avec ajax une generation des adresses selon ce qui saisie en lien avec api region reunion https://data.regionreunion.com/explore/dataset/ban-lareunion/api/-->
    <!-- <div class="col-md-12">
        <label for="id_ville" class="form-label">Ville*</label><br>
        <input type="text" name="id_ville" class="form-control" id="id_ville" step="1" value="<?php //if(isset($_POST['id_ville'])){echo $_POST['id_ville'];}?>">
    </div> -->
    <div class="d-flex flex-wrap ville_ajax align-items-stretch" role="group" aria-label="Basic checkbox toggle button group">
        <?php $villes = Villes::villesAll()?>
        <?php if(!$villes[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <?php foreach($villes[1] as $ville):?>
                <input 
                    type="radio"
                    name="ville" 
                    class="btn-check" 
                    id="<?= 'ville_'.$ville->id ?>" 
                    value="<?= $ville->id ?>"
                    <?php if(isset($_POST['villes'])){if(in_array($ville->id, $_POST['villes'])){echo 'checked';}}?>
                >
                <label class="btn btn-outline-success me-2 mb-2" for="<?= 'ville_'.$ville->id ?>">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?= $ville->libelle_ville ?>
                </label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>

    <!--Photo-->
    <h4 class="mt-4">Photo des parties communes :</h4> <br>
    <!--Mettre les photos ajoutées en miniatures-->
    <div class="col-md-12 mt-2">
        <label for="photo_logement">Ajoutez au moins une photo des parties communes</label>
        <input type="file" name="photos[]" class="form-control-file" id="photo_logement" class="photo_logement" value="<?php if(isset($_POST['photo_logement'])){echo $_POST['photo_logement'];}?>">
    </div>
    
    <div class="col-md-12 mt-5">
        *Champs obligatoires
    </div>

    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_3">Suivant</button>
    </div>
</div>
<!-- </form> -->