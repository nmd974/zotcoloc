<div class="modal fade" id="editInfosColoc" tabindex="-1" aria-labelledby="editInfosColocLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInfosColocLabel">Modifier mes informations pro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="col-md-12">
                <label for="site_web" class="form-label">Site web</label><br>
                <input type="text" name="site_web" class="form-control" id="site_web"
                    value="<?= htmlentities($mon_compte[1][0]->site_web, ENT_QUOTES)?>"
                >
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label><br>
                <textarea name="description" class="form-control" id="description">
                    <?= htmlentities($mon_compte[1][0]->description, ENT_QUOTES)?>
                </textarea>
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