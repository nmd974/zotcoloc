<div class="modal fade" id="editInfosPerso" tabindex="-1" aria-labelledby="editInfosPersoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInfosPersoLabel">Modifier mes informations personnelles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="col-md-12">
                <label for="nom" class="form-label">Nom</label><br>
                <input type="text" name="nom" class="form-control" id="nom"
                    value="<?= htmlspecialchars($mon_compte[0]->nom, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="prenom" class="form-label">Prenom</label><br>
                <input type="text" name="prenom" class="form-control" id="prenom"
                    value="<?= htmlspecialchars($mon_compte[0]->prenom, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="telephone" class="form-label">Telephone</label><br>
                <input type="number" name="telephone" class="form-control" id="telephone"
                    value="<?= htmlspecialchars($mon_compte[0]->telephone, ENT_QUOTES)?>"
                >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="save_edit_info_perso" class="btn btn-success" name="save_edit_info_perso">Modifier</button>
        </div>
      </form>
    </div>
  </div>
</div>