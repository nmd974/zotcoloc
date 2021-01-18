<div class="modal fade" id="editInfosPerso" tabindex="-1" aria-labelledby="editInfosPerso" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInfosPerso">Modifier mes informations personnelles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="col-md-12">
                <label for="nom" class="form-label">Nom</label><br>
                <input type="text" name="nom" class="form-control" id="nom"
                    value="<?= htmlentities($mon_id_particulier[1][0]->nom, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="prenom" class="form-label">Prenom</label><br>
                <input type="text" name="prenom" class="form-control" id="prenom"
                    value="<?= htmlentities($mon_id_particulier[1][0]->prenom, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="telephone" class="form-label">Telephone</label><br>
                <input type="number" name="telephone" class="form-control" id="telephone"
                    value="<?= htmlentities($mon_id_particulier[1][0]->telephone, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
            Genre :
                <div class="btn" role="group" aria-label="Basic radio toggle button group">
                        <input 
                            type="radio" 
                            name="genre" 
                            id="homme" 
                            value="homme" 
                            class="btn-check <?php if($mon_id_particulier[1][0]->genre == "homme"){echo 'checked';}?>"
                        >
                        <label class="btn btn-outline-success border-0" for="homme">
                        <i class="fa fa-male text-dark" aria-hidden="true"></i>
                        Homme</label>

                        <input type="radio" name="genre" value="femme" id="femme" 
                            class="btn-check <?php if($mon_id_particulier[1][0]->genre == "femme"){echo 'checked';}?>"
                        >
                        <label class="btn btn-outline-success border-0" for="femme">
                        <i class="fa fa-female text-dark" aria-hidden="true"></i>
                        Femme</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save_edit_info_perso" class="btn btn-success" name="save_edit_info_perso">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>