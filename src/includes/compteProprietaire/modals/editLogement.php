<?php require_once(__ROOT__.'/src/class/Regles.php');?>
<?php require_once(__ROOT__.'/src/class/Equipements.php');?>
<?php require_once(__ROOT__.'/src/class/Villes.php');?>
<?php require_once(__ROOT__.'/src/class/Logements.php');?>

<?php 
    if(isset($_GET['id'])){
        $logement_id = Logements::idLogementByIdChambre($_GET['id']);
        $logement_infos = Logements::logementByIdLogement($logement_id[1][0]->id_logement);
        $logement_regles = Regles::reglesByIdLogement($logement_id[1][0]->id_logement);
        $logement_regles_array = [];
        foreach($logement_regles[1] as $regle){
            array_push($logement_regles_array, $regle->id);
        }
        $logement_equipements = Equipements::equipementsByIdLogement($logement_id[1][0]->id_logement);
        $logement_equipements_array = [];
        foreach($logement_equipements[1] as $equipement){
            array_push($logement_equipements_array, $equipement->id);
        }
    }
?>
<div class="modal fade" id="editLogement" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editLogementLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLogementLabel">Modifier les informations du logement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!$logement_infos[0]):?>
                <div class="modal-body">
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                </div>
            <?php else:?>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!--Titre-->
                    <div class="col-md-12 mt-3">
                        <label for="titre_logement" class="form-label">Titre*</label>
                        <input type="text" class="form-control" max="100" id="titre_logement" name="titre_logement" required
                            value="<?= htmlentities($logement_infos[1][0]->titre_logement, ENT_QUOTES) ?>">
                    </div>

                    <!--Description-->
                    <div class="col-md-12 mt-3">
                        <label for="description_logement" class="form-label">Desciption du logement*</label>
                        <textarea class="form-control" id="description_logement" name="description_logement" rows="3" required>
                            <?= trim(htmlentities($logement_infos[1][0]->description_logement), ENT_QUOTES) ?>">
                        </textarea>
                    </div>

                    <!--Type-->
                    <!-- Amelioration : Faire un chargement de requete des types en cas de changement par admin pour avoir les dernieres nouveautes-->
                    <div class="col-md-12 mt-3">
                        <label for="type_logement">Type de logement</label>
                        <select class="form-control" name="type_logement" id="type_logement" required value="<?= htmlentities($logement_infos[1][0]->type_logement, ENT_QUOTES) ?>">
                            <option value="1">Villa</option>
                            <option value="2">Appartement</option>
                            <option value="3">Maison</option>
                        </select>
                    </div>

                    <!--Surface-->
                    <div class="col-md-12 mt-3">
                        <label for="surface_logement" class="form-label">Surface Totale</label>
                        <input type="number" class="form-control" id="surface_logement" name="surface_logement" required
                            value="<?= htmlentities($logement_infos[1][0]->surface_logement, ENT_QUOTES) ?>">
                    </div>

                    <!-- <h4 class="border-top mt-4">Renseignez l'adresse excte de votre logement:</h4> -->
                    <label class="text-bold mt-3">Ville *</label>

                    <!--ville-->
                    <!-- Amelioration : Faire avec ajax une generation des adresses selon ce qui saisie en lien avec api region reunion https://data.regionreunion.com/explore/dataset/ban-lareunion/api/-->

                    <div class="d-flex flex-wrap ville_ajax align-items-stretch" role="group" aria-label="Basic checkbox toggle button group" required>
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
                                    <?php if(htmlentities($logement_infos[1][0]->surface_logement, ENT_QUOTES) == $ville->id){echo 'checked';}?>
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
                    <!--Requetes des photos et pour chaque photos on fait l'image et un bouton supprimer et en dessous on peut ajouter 1 photo-->
                    <i class="fa fa-plus-square" aria-hidden="true" id="addPhoto"></i>
                    <div class="col-md-12 mt-3 mt-2">
                        <label>Ajoutez au moins une photo des parties communes</label>
                        <!-- <input type="file" name="photos_logement[]" class="form-control-file" id="photo_logement"> -->
                        <div class="mb-3" id="zone_photo_logement">
                            <input class="form-control" type="file" name="photos_logement[]">
                        </div>
                    </div>
    
                    <h4 class="mt-3">Dites-nous en plus sur le logement :</h4>

                    <!--Meublé ??-->
                    <div class="col-md-12 mt-3">
                        <div class="d-flex align-items-center"> 
                            <p>Est-il meublé ?</p>
                            <input type="radio" name="meuble" class="btn-check" id="meuble_oui" value="1"
                                <?php if(htmlentities($logement_infos[1][0]->meuble, ENT_QUOTES) == 1){echo 'checked';}?>
                            >
                                    <label class="btn btn-outline-success me-2 mb-2" for="meuble_oui">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                        Oui
                                </label>
                                <input type="radio" name="meuble" class="btn-check" id="meuble_non" value="0"
                                    <?php if(htmlentities($logement_infos[1][0]->meuble, ENT_QUOTES) == 0){echo 'checked';}?>
                                >
                                    <label class="btn btn-outline-success me-2 mb-2" for="meuble_non">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                        Non
                                </label>
                        </div>  
                    </div>

                    <!--Eligible ??-->
                    <div class="col-md-12 mt-3">
                        <div class="d-flex"> 
                            <p>Eligible aides au logements ?</p>
                            <input type="radio" name="aides_logement" class="btn-check" id="aides_logement_oui" value="1"
                                <?php if(htmlentities($logement_infos[1][0]->eligible_aides, ENT_QUOTES) == 1){echo 'checked';}?>
                            >
                                    <label class="btn btn-outline-success me-2 mb-2" for="aides_logement_oui">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                        Oui
                                </label>
                                <input type="radio" name="aides_logement" class="btn-check" id="aides_logement_non" value="0"
                                    <?php if(htmlentities($logement_infos[1][0]->eligible_aides, ENT_QUOTES) == 0){echo 'checked';}?>
                                >
                                    <label class="btn btn-outline-success me-2 mb-2" for="aides_logement_non">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                        Non
                                </label>
                        </div>  
                    </div>

                    <h4 class="border-top mt-4">Détails du logement:</h4>
                    <!--Régle de vie-->
                    <div class="col-md-12 mt-3">
                        <p>Règles:</p>
                        <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="regle_vie">
                            <?php $regles = Regles::reglesAll()?>
                            <?php if(!$regles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                            <?php else :?>
                                <?php foreach($regles[1] as $regle):?>
                                    <input type="checkbox" name="regles[]" class="btn-check" value="<?= $regle->id?>" id="<?= 'regles_'.$regle->id ?>"
                                        <?php if(in_array($regle->id, $logement_regles_array)){echo 'checked';}?>
                                    >
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
                                <input type="checkbox" name="equipements_logement[]" class="btn-check" value="<?= $equipement->id?> "id="<?= 'equipement_'.$equipement->id ?>"
                                
                                    <?php if(in_array($equipement->id, $logement_equipements_array)){echo 'checked';}?>
                                >
                                <label class="btn btn-outline-success me-2 mb-2" for="<?= 'equipement_'.$equipement->id ?>">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    <?= $equipement->libelle_equipement ?>
                                </label>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                        <!--profil colocataire recherché-->
            <div class="col-md-12">

                <h4 class="border-top mt-4">Quel est le profil idéal pour cette colocation ? :</h4>
                    
                    <p>Informez les candidatures sur le type de profil que vous recherchez.</p>
                    
                    <div class="d-flex align-items-end mb-3">
                        <p>Plutôt:</p>
                        
                        <div class="btn" role="group" aria-label="Basic radio toggle button group">
                            <input 
                                type="radio" 
                                name="profil" 
                                id="homme" 
                                value="c4ca4238a0b923820dcc509a6f75849b" 
                                class="btn-check" <?php if(htmlentities($logement_infos[1][0]->id_profil, ENT_QUOTES) == "c4ca4238a0b923820dcc509a6f75849b"){echo 'checked';}?>
                            >
                            <label class="btn btn-outline-success border-0" for="homme">
                            <i class="fa fa-male text-dark" aria-hidden="true"></i>
                            Homme</label>

                            <input type="radio" name="profil" value="c81e728d9d4c2f636f067f89cc14862c" id="femme" 
                                class="btn-check" <?php if(htmlentities($logement_infos[1][0]->id_profil, ENT_QUOTES) == "c81e728d9d4c2f636f067f89cc14862c"){echo 'checked';}?>
                            >
                            <label class="btn btn-outline-success border-0" for="femme">
                            <i class="fa fa-female text-dark" aria-hidden="true"></i>
                            Femme</label>

                            <input type="radio" name="profil" value="eccbc87e4b5ce2fe28308fd9f2a7baf3" id="indifferent" 
                                class="btn-check" <?php if(htmlentities($logement_infos[1][0]->id_profil, ENT_QUOTES) == "eccbc87e4b5ce2fe28308fd9f2a7baf3"){echo 'checked';}?>
                                >
                            <label class="btn btn-outline-success border-0" for="indifferent">
                            <i class="fa fa-users text-dark" aria-hidden="true"></i>
                            indifférent</label>
                        </div>
                    </div>

                    <div>
                        <p>Tranche d'âge:</p>
                            <div class="input-group mb-3">
                                <span class="input-group-text mb-1">Age minimum</span>
                                <input type="number" name="age_min" id="age_min" class="form-control me-5 mb-1" value="<?= htmlentities($logement_infos[1][0]->age_min, ENT_QUOTES) ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text mb-1">Age maximum</span>
                                <input type="number" class="form-control me-5 mb-1" name="age_max" id="age_max"  value="<?= htmlentities($logement_infos[1][0]->age_max, ENT_QUOTES) ?>">
                            </div>
                    </div>
                    </div>
                </div>
            </form>
            <?php endif;?>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="save_edit_logement" class="btn btn-success" name="save_edit_logement">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>