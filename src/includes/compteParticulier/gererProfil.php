<div id="profilNav_content">
  <!--Affichage de la photo de profil en mobile-->
  <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_mobile">
                <?php if(empty($ma_photo[1])):?>
                    <div class="photo_profil" style="background-image: url(../img_default/no-picture-particulier.png);"></div>
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100 text-black" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        Ajouter une photo
                    </button>
                <?php else:?>
                    <div class="photo_profil" style="background-image: url(../images/<?= $ma_photo[1][0]->libelle_photo ?>);"></div>       
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100 text-black" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        Modifier ma photo
                    </button>
                <?php endif; ?>                
            <p class="nav_title_profil"><?= $mon_id_particulier[1][0]->prenom ?></p>
            <p class="arobase_pseudo">@<?= $mon_id_particulier[1][0]->pseudo ?></p>
        </div>

  <!--Debut des accordions-->
  <div class="accordion accordion-flush shadow" id="accordion">
    <?php require_once(dirname(__DIR__).'/compteParticulier/itemsProfil/infoColoc.php');?>
    <?php require_once(dirname(__DIR__).'/compteParticulier/itemsProfil/infosPerso.php');?>
    <?php require_once(dirname(__DIR__).'/compteParticulier/itemsProfil/interets.php');?>
  </div>
</div>
