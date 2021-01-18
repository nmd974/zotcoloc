<div class="accordion-item">
    <h2 class="accordion-header" id="flush_infosColoc">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-infosColoc" aria-expanded="false" aria-controls="flush-infosColoc">
            Mes informations personnelles
        </button>
    </h2>
    <div id="flush-infosColoc" class="accordion-collapse collapse" aria-labelledby="flush-infosColoc"
        data-bs-parent="#accordion">
        <div class="accordion-body">
            <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editInfosColoc">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            </div>

            <!--pseudo-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Nom
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?= htmlentities($mon_compte[1][0]->nom, ENT_QUOTES)?>
                </div>
            </div>
            <!--description-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Prenom
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_compte[1][0]->prenom == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= htmlentities($mon_compte[1][0]->prenom, ENT_QUOTES)?>
                    <?php endif;?>
                </div>
            </div>
            <!--ecole-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Telephone
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_compte[1][0]->telephone == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= htmlentities($mon_compte[1][0]->telephone, ENT_QUOTES)?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>