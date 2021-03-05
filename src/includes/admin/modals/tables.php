<!-- ZONE CREATION -->
<!-- *******************************************************************************************************************************-->
<!-- TABLE CREATE EQUIPEMENT -->
<div class="modal fade" id="create_eqt" tabindex="-1" aria-labelledby="create_eqtLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_eqtLabel">Ajouter un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/equipements/create.php'?>">
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="libelle_equipement">
                        <label>Nom de l'équipement <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- TABLE CREATE REGLE -->
<div class="modal fade" id="create_regle" tabindex="-1" aria-labelledby="create_regleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_regleLabel">Ajouter un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/regles/create.php'?>">
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="libelle_regle">
                        <label>Nom de la règle <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- TABLE CREATE VILLE -->
<div class="modal fade" id="create_ville" tabindex="-1" aria-labelledby="create_villeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_villeLabel">Ajouter une ville</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/villes/create.php'?>">
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="libelle_ville" required>
                        <label>Nom de la règle <span class="text-danger">*</span></label>
                    </div>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="code_postal" required>
                        <label>Code postal <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- *******************************************************************************************************************************-->

<!-- *******************************************************************************************************************************-->
<!-- ZONE UPDATE AND DELETE -->
<!-- TABLE EQUIPEMENT -->
<!-- *******************************************************************************************************************************-->
<?php if(count($equipements) != 0):?>
<?php foreach($equipements as $equipement):?>
<div class="modal fade" id="edit_eqt_<?= $equipement->id?>" tabindex="-1" aria-labelledby="edit_eqt_<?= $equipement->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_eqt_<?= $equipement->id?>Label">Modifier un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/equipements/update.php'?>">
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="libelle_equipement" value="<?= $equipement->libelle_equipement?>" required>
                        <label>Nom de l'équipement <span class="text-danger">*</span></label>
                    </div>
                    <input type="hidden" name="id_equipement" value="<?= $equipement->id?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- *******************************************************************************************************************************-->
<div class="modal fade" id="delete_eqt_<?= $equipement->id?>" tabindex="-1" aria-labelledby="delete_eqt_<?= $equipement->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_eqt_<?= $equipement->id?>Label">Suppression d'un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/equipements/delete.php'?>">
                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'équipement : "<?= $equipement->libelle_equipement ?>"</p> 
                    <input type="hidden" name="id_equipement" value="<?= $equipement->id?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- TABLE REGLES -->
<?php if(count($regles) != 0):?>
<?php foreach($regles as $regle):?>
<div class="modal fade" id="edit_regle_<?= $regle->id?>" tabindex="-1" aria-labelledby="edit_regle_<?= $regle->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_regle_<?= $regle->id?>Label">Modifier une règle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/regles/update.php'?>">
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="libelle_regle" required value="<?= $regle->libelle_regle?>">
                        <label>Nom de la règle <span class="text-danger">*</span></label>
                    </div>
                    <input type="hidden" name="id_regle" value="<?= $regle->id?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- *******************************************************************************************************************************-->
<div class="modal fade" id="delete_regle_<?= $regle->id?>" tabindex="-1" aria-labelledby="delete_regle_<?= $regle->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_regle_<?= $regle->id?>Label">Supprimer une règle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/regles/delete.php'?>">
                <div class="modal-body">
                    <p>Confirmez vous la suppression de la règle : "<?= $regle->libelle_regle ?>"</p> 
                    <input type="hidden" name="id_regle" value="<?= $regle->id?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- TABLE VILLES -->
<?php if(count($villes) != 0):?>
<?php foreach($villes as $ville):?>
<div class="modal fade" id="edit_ville_<?= $ville->id?>" tabindex="-1" aria-labelledby="edit_ville<?= $ville->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_ville<?= $ville->id?>Label">Modifier une ville</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/villes/update.php'?>">
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="libelle_ville" value="<?= $ville->libelle_ville?>" required>
                        <label>Nom de la ville <span class="text-danger">*</span></label>
                    </div>
                    <input type="hidden" name="id_ville" value="<?= $ville->id?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- *******************************************************************************************************************************-->
<div class="modal fade" id="delete_ville_<?= $ville->id?>" tabindex="-1" aria-labelledby="delete_ville_<?= $ville->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_ville_<?= $ville->id?>Label">Supprimer une ville</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/tables/villes/delete.php'?>">
                <div class="modal-body">
                    <p>Confirmez vous la suppression de la ville : "<?= $ville->libelle_ville ?>"</p> 
                    <input type="hidden" name="id_ville" value="<?= $ville->id?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>
<!-- *******************************************************************************************************************************-->