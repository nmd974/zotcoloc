<div id="profilNav_content">
  <!--Affichage de la photo de profil en mobile-->
  <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_mobile">
            <!-- <form method="post" id="zone_photo_to_edit" class="d-flex flex-column justify-content-center align-items-center">  -->
                <?php if(empty($ma_photo[1])):?>
                    <div class="photo_profil" style="background-image: url(../images/no-image.png);"></div>
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        <p class="icone_photo text-black">Ajouter une photo</p>
                    </button>
                <?php else:?>
                    <div class="photo_profil" style="background-image: url(../images/<?= $ma_photo[1][0]->libelle_photo ?>);"></div>       
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        <p class="icone_photo text-white">Modifier ma photo</p>
                    </button>
                <?php endif; ?>                
            <!-- <form> -->
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
