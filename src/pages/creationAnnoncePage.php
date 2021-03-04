<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/controllers/annonces/creation/getData.php');?>

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

    <?php require_once(dirname(__DIR__).'/includes/annonces/creation/timeline.php')?>

<?php if(isset($_SESSION['flash'])):?>
<?php if($_SESSION['flash'][0] == "Success"):?>
<div class="alert alert-success mt-3"><?= $_SESSION['flash'][2] ?></div>

<?php else:?>
    <div class="alert alert-danger mt-3"><?= $_SESSION['flash'][2] ?></div>
<?php endif;?>
<?php endif;?>
    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" class="mt-3 shadow p-3 mb-5" enctype="multipart/form-data" id="create_annonce" action="../controllers/annonces/creation/create.php">
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_1.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_2.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_3.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_4.php');?>
        <?php require_once(dirname(__DIR__).'/includes/annonces/creation/step_5.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="../js/createAnnonce.js"></script>
<script src="../js/validator.js"></script>
<script>
//Ici on gere l'ajout d'une nouvelle chambre sur le formulaire de creation d'une annonce
let cptChambre = 2;
$('#addChambre').on('click', () => {
    $('#zoneChambre').append(`
    <div class="col-md-12 zone_chambre" id="zoneChambre_${cptChambre}">
        <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Chambres à louer # ${cptChambre}</p>
                    <div class="d-flex align-items-center mt-1">
                        <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                        <div class="text-dark me-3"><small>Supprimez ce bloc si vous souhaitez annuler l'ajout de cette chambre et enregistrer votre annonce</small></div>
                    </div>
                    <button type="button" class="btn btn-success me-4 mt-4 mb-4 delete_chambre" id="del_${cptChambre}">
                        <i class="fa fa-trash" aria-hidden="true"></i> Supprimer la chambre
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!--description de la chambre-->
            <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Titre et description de la chambre # ${cptChambre}</p>
                    </div>
                </div>
            </div>
            <!--Titre de la chambre-->
            <div class="col-md-12 mb-3">
                <div class="form-floating">
                    <input type="text" placeholder="Un titre accrocheur attirera l'oeil" class="form-control" maxlength="100" id="titre_chambre_${cptChambre}" name="titre_chambre[]" required>
                    <label for="titre_chambre_${cptChambre}" class="form-label">Titre de la chambre<span class="text-danger">*</span></label>
                </div>
                <div class="d-flex align-items-center mt-1">
                    <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                    <div class="text-dark me-3"><small>Par exemple : Chambre de 20m2 vue mer</small></div>
                </div>
            </div>
            
            <!--Description de la chambre-->
            <div class="col-md-12 mb-3">
                <div class="form-floating">
                    <textarea type="text" placeholder="Une description vaut mieux que de l'imagination" class="form-control" style="height: 100px" maxlength="500" id="description_chambre_${cptChambre}" name="description_chambre[]" required></textarea>
                    <label for="description_chambre_${cptChambre}" class="form-label">Description de la chambre<span class="text-danger">*</span></label>
                </div>
                <div class="d-flex align-items-center mt-1">
                    <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                    <div class="text-dark me-3"><small>Par exemple : Chambre exposée plein sud, isolée du bruit</small></div>
                </div>
            </div>
            
            <!--Surface de la chambre-->
            <div class="col-md-12 mb-3">
                <div class="form-floating">
                    <input type="number" placeholder="Surface de la chambre en m2" class="form-control" id="surface_chambre_${cptChambre}" name="surface_chambre[]" value="0">
                    <label for="surface_chambre_${cptChambre}" class="form-label">Surface de la chambre (m2)</label>
                </div>
            </div>
            <!--Type de chambre-->
            <div class="mt-4 mb-3 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Type de chambre</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="d-flex align-items-center">
                    <input type="radio" name="type_chambre_${cptChambre}" class="btn-check" id="type_chambre_${cptChambre}_oui"
                    value="Chambre principale">
                    <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_${cptChambre}_oui">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Chambre principale
                    </label>
                    <input type="radio" name="type_chambre_${cptChambre}" class="btn-check" id="type_chambre_${cptChambre}_non"
                    value="Chambre secondaire">
                    <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_${cptChambre}_non">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Chambre secondaire
                    </label>
                </div>
            </div>
            
            <!--Photo de la chambre-->
            <div class="mt-4 mb-3 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Photos de la chambre *</p>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                            <div class="text-dark me-3"><small>Une seule photo peut faire chavirer un coeur... Mettez toutes les chances de votre côté</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="mb-3" id="zone_photo_chambre_${cptChambre}">
                    <input type="file" class="form-control" name="photos_chambre_${cptChambre}[]" id="photo_chambre_${cptChambre}" multiple required>
                    <div class="invalid-feedback">Veuillez sélectionner au moins 1 photo de la chambre (6 photos maximum)</div>
                </div>
            </div>
            
            <!--a louer ??-->
            <div class="mt-4 mb-3 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Chambre disponible à la location ?</p>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                            <div class="text-dark me-3"><small>Que ce soit oui ou non, si vous activez votre annonce, la chambre sera disponible pour cette version de l'application</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="d-flex align-items-center">
                    <input type="radio" name="a_louer_${cptChambre}" class="btn-check me-3" id="a_louer_oui_${cptChambre}" value="1">
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
            <div class="col-md-12 mb-3">
                <label for="date_disponibilite_${cptChambre}" class="form-label">Date de disponibilité</label><br>
                <input type="date" name="date_disponibilite[]" class="form-control" id="date_disponibilite_${cptChambre}"
                value="<?= (new DateTime())->format('Y-m-d') ?>">
            </div>
            
            <!--Durée du bail-->
            <div class="col-md-12 mb-4">
                <div class="form-floating">
                    <input type="number" placeholder="Durée du bail de location" class="form-control" id="duree_bail_${cptChambre}" name="duree_bail[]" value="0">
                    <label for="duree_bail_${cptChambre}" class="form-label">Durée du bail (mois)</label>
                </div>
            </div>
            
            <div class="mt-4 mb-3 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Partie financière</p>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                            <div class="text-dark me-3"><small>En renseignant correctement les données financières, vous aurez plus de chance de trouver un colocataire</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--loyer-->
            <div class="col-md-12 mb-3">
                <div class="form-floating">
                    <input type="number" placeholder="Loyer à payer" class="form-control" id="loyer_${cptChambre}" name="loyer[]" value="0">
                    <label for="loyer_${cptChambre}" class="form-label">Loyer (€)</label>
                </div>
            </div>
            
            <!--charge-->
            <div class="col-md-12 mb-3">
                <div class="form-floating">
                    <input type="number" placeholder="Charges à payer" class="form-control" id="charge_${cptChambre}" name="charge[]" value="0">
                    <label for="charge_${cptChambre}" class="form-label">Charges (€)</label>
                </div>
            </div>
            
            <!--caution-->
            <div class="col-md-12 mb-3">
                <div class="form-floating">
                    <input type="number" placeholder="Loyer à payer" class="form-control" id="caution_${cptChambre}" name="caution[]" value="0">
                    <label for="caution_${cptChambre}" class="form-label">Caution (€)</label>
                </div>
            </div>
            <!--frais dossier-->
            <div class="col-md-12 mb-4">
                <div class="form-floating">
                    <input type="number" placeholder="Loyer à payer" class="form-control" id="frais_dossier_${cptChambre}" name="frais_dossier[]" value="0">
                    <label for="frais_dossier_${cptChambre}" class="form-label">Frais de dossier (€)</label>
                </div>
            </div>
            
            <div class="mt-4 mb-3 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                        <p class="text-secondary m-0 poppins h5">Equipements à l'intérieur de la chambre</p>
                        <div class="d-flex align-items-center mt-1">
                            <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                            <div class="text-dark me-3"><small>Une climatisation dans la chambre ? C'est bon à savoir...</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--equipement chambre-->
            <div class="col-md-12 mb-4">
                <p>Equipements privés:</p>
                <div class="d-flex flex-wrap interets_ajax" role="group" id="equipement_prive_${cptChambre}">
                <?php if(!$equipements[0]):?>
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                <?php foreach($equipements as $equipement):?>
                <input type="checkbox" name="equipements_chambre_${cptChambre}[]" class="btn-check"
                value="<?= $equipement->id ?>" id="<?= $equipement->id ?>">
                <label class="btn btn-outline-success me-2 mb-2" for="<?= $equipement->id ?>">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <?= $equipement->libelle_equipement ?>
                </label>
                <?php endforeach; ?>
                <?php endif;?>
            </div>
            
        </div>
    </div>        
    `)
    cptChambre++;    
})

var btn_delete_chambre = document.querySelectorAll('#bloc_step_5 .delete_chambre');
btn_delete_chambre.forEach(zone => {
    console.log(e);
});
//TODO : Faire la securisation client des modaux + ajout suppression photo logement et chambre 
</script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>
