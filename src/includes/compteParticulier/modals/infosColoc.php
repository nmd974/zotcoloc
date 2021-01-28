<div class="modal fade" id="editInfosColoc" tabindex="-1" aria-labelledby="editInfosColocLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInfosColocLabel">Modifier mes informations de colocataire</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php if(isset($_POST['save_edit_info_coloc'])){
        echo 'coucou';
      }
      ?>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="col-md-12">
                <label for="pseudo" class="form-label">Pseudo</label><br>
                <input type="text" name="pseudo" class="form-control" id="pseudo"
                    value="<?= htmlentities($mon_id_particulier[1][0]->pseudo, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label><br>
                <textarea name="description" class="form-control" id="description">
                    <?= htmlentities($mon_id_particulier[1][0]->description, ENT_QUOTES)?>
                </textarea>
            </div>
            <div class="col-md-12">
                <label for="ecole" class="form-label">Ecole</label><br>
                <input type="text" name="ecole" class="form-control" id="ecole"
                    value="<?= htmlentities($mon_id_particulier[1][0]->ecole, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="date_naissance" class="form-label">Date de naissance</label><br>
                <input type="date" name="date_naissance" class="form-control" id="date_naissance"
                    value="<?= htmlentities($mon_id_particulier[1][0]->date_naissance, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="date_disponibilite" class="form-label">Date de disponibilite</label><br>
                <input type="date" name="date_disponibilite" class="form-control" id="date_disponibilite"
                    value="<?= htmlentities($mon_id_particulier[1][0]->date_disponibilite, ENT_QUOTES)?>"
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