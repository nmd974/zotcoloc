<div class="modal fade" id="editPhoto" tabindex="-1" aria-labelledby="editPhotoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPhotoLabel">Ajouter ou modifier une photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
              <input type="file" name="image_upload" id="image_upload" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save_photo_user" class="btn btn-primary" name="save_photo_user">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>