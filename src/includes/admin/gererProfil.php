<div id="profilNav_content">
    <!--Affichage de la photo de profil en mobile-->
    <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_mobile">
        <?php if(empty($ma_photo)):?>
        <div class="photo_profil" style="background-image: url(../img_default/no-picture-proprietaire.png);"></div>
        <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
            <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
            <p class="icone_photo text-black">Ajouter une photo</p>
        </button>
        <?php else:?>
        <div class="photo_profil" style="background-image: url(../images/<?= $ma_photo[0]->libelle_photo ?>);"></div>       
        <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
            <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
            <p class="icone_photo text-black">Modifier ma photo</p>
        </button>
        <?php endif; ?>                
        <p class="nav_title_profil">@Admin</p>
    </div>
</div>
