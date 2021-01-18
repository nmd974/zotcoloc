<div id="profilNav_content">
  <!--Affichage de la photo de profil en mobile-->
  <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_mobile">
            <!-- <form method="post" id="zone_photo_to_edit" class="d-flex flex-column justify-content-center align-items-center">  -->
                <?php if(empty($ma_photo[1])):?>
                    <div class="photo_profil" style="background-image: url(../images/no-image.png);"></div>
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        <p class="icone_photo text-black">Ajouter une photo</p>
                    </button>
                <?php else:?>
                    <div class="photo_profil" style="background-image: url(../images/<?= $ma_photo[1][0]->libelle_photo ?>);"></div>       
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        <p class="icone_photo text-white">Modifier ma photo</p>
                    </button>
                <?php endif; ?>                
            <!-- <form> -->
            <p class="nav_title_profil"><?= $mon_compte[1][0]->prenom ?></p>
            <p class="arobase_pseudo">@<?= $mon_compte[1][0]->pseudo ?></p>
        </div>

        <div class="accordion-item">
    <h2 class="accordion-header" id="flush_infosPerso">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-infosPerso" aria-expanded="false" aria-controls="flush-infosPerso">
            Mes informations personnelles
        </button>
    </h2>
    <div id="flush-infosPerso" class="accordion-collapse collapse" aria-labelledby="flush-infosPerso"
        data-bs-parent="#accordion">
        <div class="accordion-body">
            <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editInfosPerso">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            </div>

            <!--nom-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Nom
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?= $mon_compte[1][0]->nom?>
                </div>
            </div>
            <!--prenom-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Prenom
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?= $mon_compte[1][0]->prenom?>
                </div>
            </div>
            <!--telephone-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Telephone
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_compte[1][0]->telephone == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_compte[1][0]->telephone?>
                    <?php endif;?>
                </div>
            </div>
            <!--telephone-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Genre
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_compte[1][0]->genre == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_compte[1][0]->genre?>
                    <?php endif;?>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
