<div class="accordion-item">
    <h2 class="accordion-header" id="flush_infosColoc">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-infosColoc" aria-expanded="false" aria-controls="flush-infosColoc">
            Mes informations pro
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
                    Site web
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_compte[1][0]->site_web == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= htmlentities($mon_compte[1][0]->site_web, ENT_QUOTES)?>
                    <?php endif;?>
                </div>
            </div>
            <!--description-->
            <div class="d-flex flex-column mb-2">
                <div class="fw-bold mb-2">
                    Description
                </div>
                <div class="border-bottom-0 border-dark bg-light">
                    <?php if($mon_compte[1][0]->description == ''):?>
                    Non renseigné
                    <?php else:?>
                    <?= htmlentities($mon_compte[1][0]->description, ENT_QUOTES)?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>