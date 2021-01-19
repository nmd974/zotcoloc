<?php require_once(__ROOT__.'/src/class/Regles.php');?>
<?php require_once(__ROOT__.'/src/class/Equipements.php');?>
<?php require_once(__ROOT__.'/src/class/Villes.php');?>
<?php require_once(__ROOT__.'/src/class/Chambres.php');?>

<?php 
    if(isset($_GET['id'])){
        $chambre_infos = Chambres::chambreById($_GET['id']);
        $chambre_equipements = Equipements::equipementsByIdChambre($_GET['id']);
        $chambre_equipements_array = [];
        foreach($chambre_equipements[1] as $equipement){
            array_push($chambre_equipements_array, $equipement->id);
        }
    }
?>
<div class="modal fade" id="editChambre" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="editChambreLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editChambreLabel">Modifier les informations de la chambre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!$chambre_infos[0]):?>
            <div class="modal-body">
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
            </div>
            <?php else:?>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!--description de la chambre-->
                    <div class="col-md-12" id="zoneChambre">
                        <!--Titre de la chambre-->
                        <div class="col-md-12">
                            <label for="titre_chambre" class="form-label">Titre de la chambre</label>
                            <input type="text" class="form-control" id="titre_chambre" name="titre_chambre" value="<?= htmlentities($chambre_infos[1][0]->titre_chambre, ENT_QUOTES) ?>">
                        </div>

                        <!--Description de la chambre-->
                        <div class="col-md-12">
                            <label for="description_chambre" class="form-label">Desciption de la chambre</label>
                            <textarea class="form-control" id="description_chambre" name="description_chambre" rows="3">
                                <?= htmlentities($chambre_infos[1][0]->description_chambre, ENT_QUOTES) ?>
                            </textarea>
                        </div>

                        <!--Surface de la chambre-->
                        <div class="col-md-12 input-group mt-3">
                            <label for="surface_chambre" class="input-group-text mb-1">Surface Totale</label>
                            <input type="number" class="form-control me-5 mb-1" id="surface_chambre"
                                name="surface_chambre" value="<?= htmlentities($chambre_infos[1][0]->surface_chambre, ENT_QUOTES) ?>">

                            <!--Type de chambre-->
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <p>Type de chambre : </p>
                                    <input type="radio" name="type_chambre_1" class="btn-check" id="type_chambre_oui"
                                        value="Chambre principale"
                                        <?php if(htmlentities($chambre_infos[1][0]->type_chambre, ENT_QUOTES) == "Chambre principale"){echo 'checked';}?>    
                                    >
                                    <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_oui">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        Chambre principale
                                    </label>
                                    <input type="radio" name="type_chambre" class="btn-check" id="type_chambre_non"
                                        value="Chambre secondaire"
                                        <?php if(htmlentities($chambre_infos[1][0]->type_chambre, ENT_QUOTES) == "Chambre secondaire"){echo 'checked';}?>    
                                    >
                                    <label class="btn btn-outline-success me-2 mb-2" for="type_chambre_non">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        Chambre secondaire
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!--a louer ??-->
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <p>Disponible à la location ?</p>
                                <input type="radio" name="a_louer" class="btn-check" id="a_louer_oui" value="1"
                                <?php if(htmlentities($chambre_infos[1][0]->a_louer, ENT_QUOTES) == 1){echo 'checked';}?>
                                >
                                <label class="btn btn-outline-success me-2 mb-2" for="a_louer_oui">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Oui
                                </label>
                                <input type="radio" name="a_louer" class="btn-check" id="a_louer_non" value="0"
                                <?php if(htmlentities($chambre_infos[1][0]->a_louer, ENT_QUOTES) == 0){echo 'checked';}?>
                                >
                                <label class="btn btn-outline-success me-2 mb-2" for="a_louer_non">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    Non
                                </label>
                            </div>
                        </div>

                        <!--Date disponibilité-->
                        <div class="col-md-12 mt-3">
                            <label for="date_disponibilite" class="form-label">Date de idsponibilité</label><br>
                            <input type="date" name="date_disponibilite" class="form-control" id="date_disponibilite"
                            value="<?= htmlentities($chambre_infos[1][0]->surface_chambre, ENT_QUOTES) ?>">
                        </div>

                        <!--Durée du bail-->
                        <div class="col-md-12 mt-3">
                            <label for="duree_bail" class="form-label">Durée du bail</label>
                            <input type="number" class="form-control" id="duree_bail" name="duree_bail"
                                placeholder="en mois"
                                value="<?= htmlentities($chambre_infos[1][0]->duree_bail, ENT_QUOTES) ?>">
                        </div>

                        <!--loyer-->
                        <div class="col-md-12 mt-3">
                            <label for="loyer" class="form-label">Loyer</label>
                            <input type="number" class="form-control" id="loyer" name="loyer" placeholder="en €"
                            value="<?= htmlentities($chambre_infos[1][0]->loyer, ENT_QUOTES) ?>">
                        </div>

                        <!--charge-->
                        <div class="col-md-12 mt-3">
                            <label for="charge" class="form-label">Charge</label>
                            <input type="number" class="form-control" id="charge" name="charge" placeholder="en €"
                            value="<?= htmlentities($chambre_infos[1][0]->charge, ENT_QUOTES) ?>">
                        </div>

                        <!--caution-->
                        <div class="col-md-12 mt-3">
                            <label for="caution" class="form-label">Caution</label>
                            <input type="number" class="form-control" id="caution" name="caution" placeholder="en €"
                            value="<?= htmlentities($chambre_infos[1][0]->caution, ENT_QUOTES) ?>">
                        </div>

                        <!--frais dossier-->
                        <div class="col-md-12 mt-3">
                            <label for="frais_dossier" class="form-label">Frais dossier</label>
                            <input type="number" class="form-control" id="frais_dossier" name="frais_dossier"
                                placeholder="en €"
                                value="<?= htmlentities($chambre_infos[1][0]->frais_dossier, ENT_QUOTES) ?>">
                        </div>

                        <!--equipement chambre-->
                        <div class="col-md-12 mt-3">
                            <p>Equipements privés:</p>
                            <div class="d-flex flex-wrap interets_ajax" role="group"
                                aria-label="Basic checkbox toggle button group" id="equipement_prive">
                                <?php $equipements = Equipements::equipementAll()?>
                                <?php if(!$equipements[0]):?>
                                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !
                                </div>
                                <?php else :?>
                                    <?php foreach($equipements[1] as $equipement):?>
                                        <input type="checkbox" name="equipements_chambre[]" class="btn-check"
                                            value="<?= $equipement->id ?>" id="<?= $equipement->id ?>"
                                            <?php if(in_array($equipement->id, $chambre_equipements_array)){echo 'checked';}?>    
                                        >
                                        <label class="btn btn-outline-success me-2 mb-2" for="<?= $equipement->id ?>">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            <?= $equipement->libelle_equipement ?>
                                        </label>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </div>
                        </div>
            </form>
            <?php endif;?>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="save_edit_chambre" class="btn btn-success" name="save_edit_chambre">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>