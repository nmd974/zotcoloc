<!-- TABLE CREATE EQUIPEMENT -->
<div class="modal fade" id="create_eqtLabel" tabindex="-1" aria-labelledby="create_eqtLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_eqtLabel">Ajouter un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/tables/equipements/create.php'?>">
                <div class="modal-body">
                <div class="form-floating">
                    <input type="text" class="form-control" name="libelle_equipement">
                    <label for="libelle_equipement">Nom de l'équipement <span class="text-danger">*</span></label>
                </div>
                    <input type="hidden" name="role" value="<?=$_SESSION['role']?>">
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
<div class="modal fade" id="create_relge" tabindex="-1" aria-labelledby="create_relgeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_relgeLabel">Ajouter un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/tables/regles/create.php'?>">
                <div class="modal-body">
                <div class="form-floating">
                    <input type="text" class="form-control" name="libelle_regle">
                    <label for="libelle_regle">Nom de la règle <span class="text-danger">*</span></label>
                </div>
                    <input type="hidden" name="role" value="<?=$_SESSION['role']?>">
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
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/tables/villes/create.php'?>">
                <div class="modal-body">
                <div class="form-floating">
                    <input type="text" class="form-control" name="libelle_ville" required>
                    <label for="libelle_ville">Nom de la règle <span class="text-danger">*</span></label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" name="code_postal" required>
                    <label for="code_postal">Code postal <span class="text-danger">*</span></label>
                </div>
                    <input type="hidden" name="role" value="<?=$_SESSION['role']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- TABLE EQUIPEMENT -->
<?php if(count($equipements) != 0):?>
<?php foreach($equipements as $equipement):?>
<div class="modal fade" id="edit_eqt_<?= $equipement->id?>" tabindex="-1" aria-labelledby="edit_eqt_<?= $equipement->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_eqt_<?= $equipement->id?>Label">Modifier un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/tables/equipements/update.php'?>">
                <div class="modal-body">
                    <input type="text" name="libelle_equipement" value="<?= $equipement->libelle_equipement?>">
                    <input type="hidden" name="id_equipement" value="<?= $equipement->id?>">
                    <input type="hidden" name="role" value="<?=$_SESSION['role']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
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
<div class="modal fade" id="edit_regles_<?= $regle->id?>" tabindex="-1" aria-labelledby="edit_regles_<?= $regle->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_regles_<?= $regle->id?>Label">Modifier un équipement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/tables/regles/update.php'?>">
                <div class="modal-body">
                    <input type="text" name="libelle_regle" value="<?= $regle->libelle_regle?>">
                    <input type="hidden" name="id_regle" value="<?= $regle->id?>">
                    <input type="hidden" name="role" value="<?=$_SESSION['role']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>

<!-- TABLE REGLES -->
<?php if(count($villes) != 0):?>
<?php foreach($villes as $ville):?>
<div class="modal fade" id="edit_ville<?= $ville->id?>" tabindex="-1" aria-labelledby="edit_ville<?= $ville->id?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_ville<?= $ville->id?>Label">Modifier une ville</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/tables/villes/update.php'?>">
                <div class="modal-body">
                    <input type="text" name="libelle_regle" value="<?= $ville->libelle_ville?>">
                    <input type="hidden" name="id_ville" value="<?= $ville->id?>">
                    <input type="hidden" name="role" value="<?=$_SESSION['role']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>
