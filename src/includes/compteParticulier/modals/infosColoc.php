<div class="modal fade" id="editInfoPerso" tabindex="-1" aria-labelledby="editInfoPersoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInfoPersoLabel">Ajouter ou modifier une photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="col-md-12">
                <label for="pseudo" class="form-label">Pseudo</label><br>
                <input type="text" name="pseudo" class="form-control" id="pseudo"
                    value="<?= $mon_id_particulier[1][0]->pseudo?>"
                >
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label><br>
                <textarea name="description" class="form-control" id="description">
                    <?= $mon_id_particulier[1][0]->description?>
                </textarea>
            </div>
            <div class="col-md-12">
                <label for="ecole" class="form-label">Ecole</label><br>
                <input type="text" name="ecole" class="form-control" id="ecole"
                    value="<?= $mon_id_particulier[1][0]->ecole?>"
                >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save_edit_info_coloc" class="btn btn-success" name="save_edit_info_coloc">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>