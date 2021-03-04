<!-- TABLE PROPRIETAIRE -->
<?php if(count($proprietaires) != 0):?>
<?php foreach($proprietaires as $proprietaire):?>
<div class="modal fade" id="delete_proprietaire_<?= $proprietaire->id_proprietaire?>" tabindex="-1" aria-labelledby="delete_proprietaire_<?= $proprietaire->id_proprietaire?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_proprietaire_<?= $proprietaire->id_proprietaire?>Label">Supprimer un proprietaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/utilisateurs/proprietaire/delete.php'?>">
                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'utilisateur : "<?= ucfirst($proprietaire->nom) . '' . ucfirst($proprietaire->prenom) ?>"</p> 
                    <input type="hidden" name="id_proprietaire" value="<?= $proprietaire->id_proprietaire?>">
                    <input type="hidden" name="id" value="<?= $proprietaire->id_user?>">
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
<!-- TABLE PARTICULIER -->
<?php if(count($particuliers) != 0):?>
<?php foreach($particuliers as $particulier):?>
<div class="modal fade" id="delete_particulier_<?= $particulier->id_particulier?>" tabindex="-1" aria-labelledby="delete_particulier_<?= $particulier->id_particulier?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_particulier_<?= $particulier->id_particulier?>Label">Supprimer un particulier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/controllers/utilisateurs/particulier/delete.php'?>">
                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'utilisateur : "<?= ucfirst($particulier->nom) . '' . ucfirst($particulier->prenom) ?>"</p> 
                    <input type="hidden" name="id_particulier" value="<?= $particulier->id_particulier?>">
                    <input type="hidden" name="id" value="<?= $particulier->id_user?>">
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