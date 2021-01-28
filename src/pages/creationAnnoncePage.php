<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/controllers/createAnnonce.php');?>


<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">Ajouter annonce Colocation</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Etape 1/4:<span class="text-green"> Description</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper_page_content">

    <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/timeline.php')?>
    <?php
    if(isset($_POST['enregistrer_annonce'])){
        if(!isset($_POST['id_logement'])){
            $_POST['id_logement'] = substr(md5(uniqid(rand(), true)),0,32);
        }
        $validationCreation = creationAnnonce($_POST, $_FILES, $_SESSION['id_utilisateur']);
        // print_r($_POST);
        // print_r($_FILES);
        print_r($validationCreation);
        if($validationCreation[0]){
            header_remove('Location');
            header('Location: ./compteProprietaire.php');
        }
    }
?>
<pre>
    <?php         
    //     print_r($_POST);
    //     print_r($_FILES);
    //     if(isset($validationCreation))
    //     {
    //         print_r($validationCreation);
    //     };
    // ?>
</pre>
    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" enctype="multipart/form-data" id="formulaire_inscription">
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_1.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_2.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_3.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_4.php');?>
        <?php require_once(dirname(__DIR__).'/includes/creerAnnonce/step_5.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/createAnnonce.js"></script>
<script src="../js/validationFormLogement.js"></script>
<script>
//Ici on gere l'ajout d'une nouvelle chambre sur le formulaire de creation d'une annonce
let cptChambre = 2;
let newArray = '[]';
$('#addChambre').on('click', () => {
    $('#zoneChambre').append(`
    <h4 class="mb-2">Chambre #${cptChambre}</h4>
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
            <input type="number" class="form-control me-5 mb-1" id="surface_chambre" name="surface_chambre_${cptChambre}" value="0">

            <!--Type de chambre-->
            <div class="col-md-12">
                <div class="d-flex align-items-center"> 
                    <p>Type de chambre : </p>
                    <input type="radio" name="type_chambre_${cptChambre}" class="btn-check" id="type_chambre_${cptChambre}_oui" value="Chambre principale">
                            <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_${cptChambre}_oui">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Chambre principale
                        </label>
                        <input type="radio" name="type_chambre_${cptChambre}" class="btn-check" id="type_chambre_${cptChambre}_non" value="Chambre secondaire">
                            <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_${cptChambre}_non">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Chambre secondaire
                        </label>
                </div>  
            </div>
        </div>

        <!--Photo de la chambre-->
        <div class="col-md-12 mt-3">
            <label for="photo_chambre">ajoutez au moins une photo de la chambre</label>
            <input type="file" class="form-control-file" name="photos_chambre_${cptChambre}[]">
        </div>

        <div class="col-md-12">
        <div class="d-flex align-items-center"> 
            <p>Disponible à la location ?</p>
            <input type="radio" name="a_louer_${cptChambre}" class="btn-check" id="a_louer_oui_${cptChambre}" value="1">
                    <label class="btn btn-outline-success me-2 mb-2" for="a_louer_oui_${cptChambre}">
                    <i class="fa fa-check" aria-hidden="true"></i>
                        Oui
                </label>
                <input type="radio" name="a_louer_${cptChambre}" class="btn-check" id="a_louer_non_${cptChambre}" value="0">
                    <label class="btn btn-outline-success me-2 mb-2" for="a_louer_non_${cptChambre}">
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
                <input type="checkbox" name="equipements_chambre_${cptChambre}[]" class="btn-check" value="<?= $equipement->id ?>" id="chambre_${cptChambre}_<?= $equipement->id ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="chambre_${cptChambre}_<?= $equipement->id ?>">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?= $equipement->libelle_equipement ?>
                </label>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
        </div>
        
    `)
    cptChambre++;
    newArray = newArray + '[]';
})
</script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>