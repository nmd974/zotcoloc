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
                    value="<?= htmlentities($mon_compte[1][0]->nom, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="prenom" class="form-label">Prenom</label><br>
                <input type="text" name="prenom" class="form-control" id="prenom"
                    value="<?= htmlentities($mon_compte[1][0]->prenom, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="telephone" class="form-label">Telephone</label><br>
                <input type="number" name="telephone" class="form-control" id="telephone"
                    value="<?= htmlentities($mon_compte[1][0]->telephone, ENT_QUOTES)?>"
                >
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