<?php require_once(__ROOT__.'/src/class/Regles.php');?>
<?php require_once(__ROOT__.'/src/class/Equipements.php');?>
<?php require_once(__ROOT__.'/src/class/Villes.php');?>

<div class="modal fade" id="editInfosColoc" tabindex="-1" aria-labelledby="editInfosColocLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfosColocLabel">Modifier mes informations pro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <h4>Dites-en plus sur votre logement:</h4>

                    <!--Titre-->
                    <div class="col-md-12">
                        <label for="titre_logement" class="form-label">Titre*</label>
                        <input type="text" class="form-control" max="100" id="titre_logement" name="titre_logement"
                            value="<?php if(isset($_POST['titre_logement'])){
                                echo $_POST['titre_logement'];
                            }?>">
                    </div>

                    <!--Description-->
                    <div class="col-md-12">
                        <label for="description_logement" class="form-label">Desciption du logement*</label>
                        <textarea class="form-control" id="description_logement" name="description_logement" rows="3"></textarea 
                        value="<?php if(isset($_POST['description_logement'])){echo $_POST['description_logement'];}?>">
                    </div>

                    <!--Type-->
                    <!-- Amelioration : Faire un chargement de requete des types en cas de changement par admin pour avoir les dernieres nouveautes-->
                    <div class="col-md-12">
                        <label for="type_logement">Type de logement</label>
                        <select class="form-control" name="type_logement" id="type_logement" value="<?php if(isset($_POST['type_logement'])){echo $_POST['type_logement'];}?>">
                            <option value="1">Villa</option>
                            <option value="2">Appartement</option>
                            <option value="3">Maison</option>
                        </select>
                    </div>

                    <!--Surface-->
                    <div class="col-md-12">
                        <label for="surface_logement" class="form-label">Surface Totale</label>
                        <input type="number" class="form-control" id="surface_logement" name="surface_logement" value="<?php if(isset($_POST['surface_logement'])){echo $_POST['surface_logement'];}?>">
                    </div>

                    <!-- <h4>Renseignez l'adresse excte de votre logement:</h4> -->
                    <h4>Sélectionnez la ville de votre logement</h4>

                    <!--ville-->
                    <!-- Amelioration : Faire avec ajax une generation des adresses selon ce qui saisie en lien avec api region reunion https://data.regionreunion.com/explore/dataset/ban-lareunion/api/-->

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
                    <i class="fa fa-plus-square" aria-hidden="true" id="addPhoto"></i>
                    <div class="col-md-12 mt-2">
                        <label>Ajoutez au moins une photo des parties communes</label>
                        <!-- <input type="file" name="photos_logement[]" class="form-control-file" id="photo_logement"> -->
                        <div class="mb-3" id="zone_photo_logement">
                            <input class="form-control" type="file" name="photos_logement[]">
                        </div>
                    </div>
    
                    <h4 class="mt-3">Dites-nous en plus sur le logement :</h4>

                    <!--Meublé ??-->
                    <div class="col-md-12">
                        <div class="d-flex align-items-center"> 
                            <p>Est-il meublé ?</p>
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
                    </div>

                    <!--Eligible ??-->
                    <div class="col-md-12">
                        <div class="d-flex"> 
                            <p>Eligible aides au logements ?</p>
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
                    </div>

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
                                    <input type="checkbox" name="regles[]" class="btn-check" value="<?= $regle->id?>" id="<?= 'regles_'.$regle->id ?>">
                                    <label class="btn btn-outline-success me-2 mb-2" for="<?= 'regles_'.$regle->id ?>">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        <?= $regle->libelle_regle ?>
                                    </label>
                                <?php endforeach; ?>
                            <?php endif;?>
                        <div>
                    </div>

                    <!--Equipement logement-->
                    <p>Equipements et services:</p>
                    <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="equipement_logement">
                        <?php $equipements = Equipements::equipementAll()?>
                        <?php if(!$equipements[0]):?>
                            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                        <?php else :?>
                            <?php foreach($equipements[1] as $equipement):?>
                                <input type="checkbox" name="equipements_logement[]" class="btn-check" value="<?= $equipement->id?> "id="<?= 'equipement_'.$equipement->id ?>">
                                <label class="btn btn-outline-success me-2 mb-2" for="<?= 'equipement_'.$equipement->id ?>">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    <?= $equipement->libelle_equipement ?>
                                </label>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="save_edit_info_coloc" class="btn btn-success" name="save_edit_info_coloc">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>