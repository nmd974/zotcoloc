<div id="bloc_step_5" class="unshow_step">
    <div class="arrow_return d-flex align-items-center mb-5" id="back_step4">
        <i class="fa fa-arrow-left fa-2x text-dark" aria-hidden="true"></i>
        <p class="text-secondary m-0 poppins h5 ms-4">Précédent</p>
    </div>
    <div class="col-md-12" id="zoneChambre">
        <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Chambres à louer # 1</p>
                    <div class="d-flex align-items-center mt-1">
                        <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                        <div class="text-dark me-3"><small>Pour que l'annonce soit valide, il faut au moins ajouter 1 chambre à louer</small></div>
                    </div>
                </div>
            </div>
        </div>
        <!--description de la chambre-->
        <div class="mt-4 mb-4 bg-light">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Titre et description de la chambre</p>
                </div>
            </div>
        </div>
        <!--Titre de la chambre-->
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="text" placeholder="Un titre accrocheur attirera l'oeil" class="form-control" maxlength="100" id="titre_chambre" name="titre_chambre[]" required value="<?php if(isset($_SESSION['tmp-content']['titre_logement'])){echo htmlspecialchars($_SESSION['tmp-content']['titre_logement']);}?>">
                <label for="titre_chambre" class="form-label">Titre de la chambre<span class="text-danger">*</span></label>
            </div>
            <div class="d-flex align-items-center mt-1">
                <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                <div class="text-dark me-3"><small>Par exemple : Chambre de 20m2 vue mer</small></div>
            </div>
        </div>
        
        <!--Description de la chambre-->
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <textarea placeholder="Une description vaut mieux que de l'imagination" class="form-control" style="height: 100px" maxlength="500" id="description_chambre" name="description_chambre[]" required> <?php if(isset($_SESSION['tmp-content']['description_chambre'])){echo htmlspecialchars($_SESSION['tmp-content']['description_chambre']);}?></textarea>
                <label for="description_chambre" class="form-label">Description de la chambre<span class="text-danger">*</span></label>
            </div>
            <div class="d-flex align-items-center mt-1">
                <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
                <div class="text-dark me-3"><small>Par exemple : Chambre exposée plein sud, isolée du bruit</small></div>
            </div>
        </div>
        
        <!--Surface de la chambre-->
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="number" placeholder="Surface de la chambre en m2" class="form-control" id="surface_chambre_1" name="surface_chambre[]" value="<?= isset($_SESSION['tmp-content']['titre_logement']) ? htmlspecialchars($_SESSION['tmp-content']['titre_logement']) : '' ?>">
                <label for="surface_chambre_1" class="form-label">Surface de la chambre (m2)</label>
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
                <input type="radio" name="type_chambre_1" class="btn-check" id="type_chambre_1_oui"
                value="Chambre principale">
                <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_1_oui">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Chambre principale
                </label>
                <input type="radio" name="type_chambre_1" class="btn-check" id="type_chambre_1_non"
                value="Chambre secondaire">
                <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_1_non">
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
            <div class="mb-3" id="zone_photo_chambre_1">
                <input type="file" class="form-control" name="photos_chambre_1[]" multiple required>
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
                <input type="radio" name="a_louer_1" class="btn-check me-3" id="a_louer_oui" value="1">
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
        <div class="col-md-12 mb-3">
            <label for="date_disponibilite" class="form-label">Date de disponibilité</label><br>
            <input type="date" name="date_disponibilite[]" class="form-control" id="date_disponibilite"
            value="<?= isset($_SESSION['tmp-content']['date_disponibilite']) ? htmlspecialchars($_SESSION['tmp-content']['date_disponibilite']) : (new DateTime())->format('Y-m-d') ?>">
        </div>
        
        <!--Durée du bail-->
        <div class="col-md-12 mb-4">
            <div class="form-floating">
                <input type="number" placeholder="Durée du bail de location" class="form-control" id="duree_bail" name="duree_bail[]" value="<?= isset($_SESSION['tmp-content']['duree_bail']) ? htmlspecialchars($_SESSION['tmp-content']['duree_bail']) : '' ?>">
                <label for="duree_bail" class="form-label">Durée du bail (mois)</label>
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
                <input type="number" placeholder="Loyer à payer" class="form-control" id="loyer_1" name="loyer[]" value="<?= isset($_SESSION['tmp-content']['loyer']) ? htmlspecialchars($_SESSION['tmp-content']['loyer']) : '' ?>">
                <label for="loyer_1" class="form-label">Loyer (€)</label>
            </div>
        </div>
        
        <!--charge-->
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="number" placeholder="Charges à payer" class="form-control" id="charge_1" name="charges[]" value="<?= isset($_SESSION['tmp-content']['charge']) ? htmlspecialchars($_SESSION['tmp-content']['charge']) : '' ?>">
                <label for="charge_1" class="form-label">Charges (€)</label>
            </div>
        </div>
        
        <!--caution-->
        <div class="col-md-12 mb-3">
            <div class="form-floating">
                <input type="number" placeholder="Loyer à payer" class="form-control" id="caution_1" name="caution[]" value="<?= isset($_SESSION['tmp-content']['caution']) ? htmlspecialchars($_SESSION['tmp-content']['caution']) : '' ?>">
                <label for="caution_1" class="form-label">Caution (€)</label>
            </div>
        </div>
        <!--frais dossier-->
        <div class="col-md-12 mb-4">
            <div class="form-floating">
                <input type="number" placeholder="Loyer à payer" class="form-control" id="frais_dossier_1" name="frais_dossier[]" value="<?= isset($_SESSION['tmp-content']['frais_dossier']) ? htmlspecialchars($_SESSION['tmp-content']['frais_dossier']) : '' ?>">
                <label for="frais_dossier_1" class="form-label">Frais de dossier (€)</label>
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
            <div class="d-flex flex-wrap interets_ajax" role="group" id="equipement_prive_1">
                <?php if(!$equipements[0]):?>
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                <?php foreach($equipements as $equipement):?>
                <input type="checkbox" name="equipements_chambre_1[]" class="btn-check"
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
    <div class="col-12 text-start my-4">
        <button type="button" class="btn btn-success me-4 mt-4 mb-4" id="addChambre">
            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une chambre supplémentaire
        </button>
    </div>
        <!--button validation inscription-->
        <div class="col-12 text-end my-4">
            <button type="submit" class="btn w-25 bg-green text-white mr-5" id="enregistrer_annonce" name="enregistrer_annonce">J'enregistre mon annonce</button>
        </div>
</div>