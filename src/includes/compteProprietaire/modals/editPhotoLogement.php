<?php require_once(__ROOT__.'/src/class/Photos.php');?>
<?php require_once(__ROOT__.'/src/class/Logements.php');?>

<?php 
    if(isset($_GET['id'])){
        $logement_id = Logements::idLogementByIdChambre($_GET['id']);
        $logement_photos = Photos::photosByIdLogement($logement_id[1][0]->id_logement);
    }
?>
<div class="modal fade" id="editPhotoLogement" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editPhotoLogementLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhotoLogementLabel">Modifier les photos du logement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!$logement_photos[0]):?>
                <div class="modal-body">
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                </div>
            <?php else:?>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php if(count($logement_photos[1]) !== 0):?>
                        <?php foreach($logement_photos[1] as $photo):?>
                            <div class="border-bottom d-flex justify-content-around align-items-center mb-4">
                                <div id="cadre_photo" style="background-image: url(../images/<?= $logement_photos[1][0]->libelle_photo ?>);"></div>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </div>
                        <?php endforeach; ?>
                    <?php endif;?>
                    <input type="file" name="image_upload" id="image_upload" >
                </div>
            </form>
            <?php endif;?>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="save_edit_logement" class="btn btn-success" name="save_edit_logement">Modifier</button>
            </div>
        </div>
    </div>
</div>