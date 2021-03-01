<div class="modal fade" id="deleteUser" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="deleteUserLabel">Supprimer mon compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php getenv("URL_APP")?>/src/controllers/utilisateurs/particulier/delete.php">
        <div class="modal-body text-center">
            <div>Etes vous sûr de vouloir supprimer votre compte ?</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Supprimer mon compte</button>
        </div>
        <input type="hidden" name="id" value="<?= $_SESSION['id_utilisateur'] ?>">
        <input type="hidden" name="id_particulier" value="<?= $mon_id_particulier[1][0]->id ?>">
      </form>
    </div>
  </div>
</div>