<div class="accordion-item">
      <h2 class="accordion-header" id="habitude-alimentaires">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#habitudes_alimentaires" aria-expanded="false" aria-controls="habitudes_alimentaires">
          Mes intérêts
        </button>
      </h2>
      <div id="habitudes_alimentaires" class="accordion-collapse collapse" aria-labelledby="habitude-alimentaires" data-bs-parent="#accordion">
        <div class="accordion-body">
            <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editInterets">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            </div>
            <!-- Habitudes alimentaires-->
            <div class="mt-4 mb-4 bg-light">
              <div class="col border-one ps-1">
                  <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Mes habitudes alimentaires</p>
                  </div>
              </div>
            </div>
            <div class="d-flex flex-wrap" id="habitudes_alimentaires">
              <?php $interets = Interets::habitudes_alimentaires()?>
              <?php if(!$interets[0]):?>
                  <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
              <?php else :?>
                  <?php foreach($interets[1] as $interet):?>
                    <?php if(in_array($interet->id_interet, $mes_interet_list)):?>
                      <div class="me-2">
                        #<?= $interet->libelle_interet ?>
                      </div>
                    <?php endif?>
                  <?php endforeach; ?>
              <?php endif;?>
            </div>
            <!-- Mes centres d'interets-->
            <div class="mt-4 mb-4 bg-light">
              <div class="col border-one ps-1">
                  <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Mes centres d'intérêts</p>
                  </div>
              </div>
            </div>
            <div class="d-flex flex-wrap" id="habitudes_alimentaires">
              <?php $interets = Interets::centres_interets()?>
              <?php if(!$interets[0]):?>
                  <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
              <?php else :?>
                  <?php foreach($interets[1] as $interet):?>
                    <?php if(in_array($interet->id_interet, $mes_interet_list)):?>
                      <div class="me-2">
                        #<?= $interet->libelle_interet ?>
                      </div>
                    <?php endif?>
                  <?php endforeach; ?>
              <?php endif;?>
            </div>
            <!-- Ma personnalité -->
            <div class="mt-4 mb-4 bg-light">
              <div class="col border-one ps-1">
                  <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Ma personnalité</p>
                  </div>
              </div>
            </div>
            <div class="d-flex flex-wrap" id="habitudes_alimentaires">
              <?php $interets = Interets::personnalite()?>
              <?php if(!$interets[0]):?>
                  <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
              <?php else :?>
                  <?php foreach($interets[1] as $interet):?>
                    <?php if(in_array($interet->id_interet, $mes_interet_list)):?>
                      <div class="me-2">
                        #<?= $interet->libelle_interet ?>
                      </div>
                    <?php endif?>
                  <?php endforeach; ?>
              <?php endif;?>
            </div>
            <!-- Mon style de vie -->
            <div class="mt-4 mb-4 bg-light">
              <div class="col border-one ps-1">
                  <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Mon style de vie</p>
                  </div>
              </div>
            </div>
            <div class="d-flex flex-wrap" id="habitudes_alimentaires">
              <?php $interets = Interets::style_vie()?>
              <?php if(!$interets[0]):?>
                  <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
              <?php else :?>
                  <?php foreach($interets[1] as $interet):?>
                    <?php if(in_array($interet->id_interet, $mes_interet_list)):?>
                      <div class="me-2">
                        #<?= $interet->libelle_interet ?>
                      </div>
                    <?php endif?>
                  <?php endforeach; ?>
              <?php endif;?>
            </div>
        </div>
      </div>
    </div>