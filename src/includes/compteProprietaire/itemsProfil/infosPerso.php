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
                    <?= $mon_id_particulier[1][0]->nom?>
                </div>
            </div>
            <!--prenom-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Prenom
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?= $mon_id_particulier[1][0]->prenom?>
                </div>
            </div>
            <!--telephone-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Telephone
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_id_particulier[1][0]->telephone == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_id_particulier[1][0]->telephone?>
                    <?php endif;?>
                </div>
            </div>
            <!--telephone-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Genre
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_id_particulier[1][0]->genre == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_id_particulier[1][0]->genre?>
                    <?php endif;?>
                </div>
            </div>
            
        </div>
    </div>
</div>