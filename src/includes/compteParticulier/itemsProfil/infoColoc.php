<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-infosColoc" aria-expanded="false" aria-controls="flush-infosColoc">
            Mon profil de coloc
        </button>
    </h2>
    <div id="flush-infosColoc" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
        data-bs-parent="#accordion">
        <div class="accordion-body">
            <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editInfoPerso">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            </div>

            <!--pseudo-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Pseudo
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?= $mon_id_particulier[1][0]->pseudo?>
                </div>
            </div>
            <!--description-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Description
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_id_particulier[1][0]->description == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_id_particulier[1][0]->description?>
                    <?php endif;?>
                </div>
            </div>
            <!--ecole-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Ecole
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_id_particulier[1][0]->ecole == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_id_particulier[1][0]->ecole?>
                    <?php endif;?>
                </div>
            </div>
            <!--Date de siponibilite-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Date de disponibilite
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_id_particulier[1][0]->date_disponibilite == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_id_particulier[1][0]->date_disponibilite?>
                    <?php endif;?>
                </div>
            </div>
            <!--Date de naissance-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Date de naissance
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_id_particulier[1][0]->date_naissance == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= $mon_id_particulier[1][0]->date_naissance?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>