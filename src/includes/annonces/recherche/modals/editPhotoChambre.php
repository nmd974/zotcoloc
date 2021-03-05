<?php require_once(__ROOT__.'/src/class/Photos.php');?>
<?php require_once(__ROOT__.'/src/class/Chambres.php');?>
<?php require_once(__ROOT__.'/src/class/Logements.php');?>

<?php 
if(isset($_GET['id'])){
    $chambre_photos = Photos::photosByIdChambre(htmlspecialchars($_GET['id']));
    $logement_id = Logements::idLogementByIdChambre(htmlspecialchars($_GET['id']));
    $utilisateur = Logements::logementByIdLogement($logement_id[1][0]->id_logement);
}
?>
<div class="modal fade" id="editPhotoChambre" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editPhotoChambreLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhotoChambreLabel">Modifier les photos de la chambre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if(!$chambre_photos[0]):?>
            <div class="modal-body">
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
            </div>
            <?php else:?>
            <form method="post" enctype="multipart/form-data" action="<?= getenv("URL_APP") . '/src/controllers/annonces/chambres/photos/create.php'?>">
                <div class="modal-body" id="zone_photo_chambre">
                    
                    <?php if(count($chambre_photos[1]) !== 0):?>
                        <?php foreach($chambre_photos[1] as $photo):?>
                            <div class="border-bottom d-flex justify-content-between align-items-center mb-4">
                                <div id="cadre_photo" class="mb-2" style="background-image: url(../images/<?= $photo->libelle_photo ?>);"></div>
                                <i class="fa fa-trash text-danger fa-3x delete_photo" aria-hidden="true" id="<?= $photo->id_photo ?>"></i>
                            </div>
                        <?php endforeach; ?>
                    <?php endif;?>
                    <input type="file" name="photos_logement[]" multiple>
                    <input type="hidden" name="id_utilisateur" value="<?= $utilisateur[1][0]->id_utilisateur ?>">
                    <input type="hidden" name="id_chambre" value="<?= htmlspecialchars($_GET['id']) ?>">
                    <input type="hidden" name="count_actuel" value="<?= count($chambre_photos[1]) ?>">
                    
                </div>
                
                <?php endif;?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var btn_delete_photo = document.querySelectorAll('#zone_photo_chambre .delete_photo');
    btn_delete_photo.forEach(btn => {
        btn.addEventListener('click', (e) => {
            var id = e.path[0].id;
            //Verification si email en doublon
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){
                    $('#zone_photo_chambre').prepend(this.responseText);
                    document.getElementById(`${id}`).remove();
                }else{
                    $('#zone_photo_chambre').prepend(this.responseText);
                }
            };
            xmlhttp.open("POST", `${location.origin}/src/controllers/annonces/chambres/photos/delete.php?id_photo=${id}&user=${<?= $utilisateur[1][0]->id_utilisateur ?>}`, true);
            xmlhttp.send();
        })
    });
</script>