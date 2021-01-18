<div class="modal fade" id="editInterets" tabindex="-1" aria-labelledby="editInterets" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editInterets">Modifier mes informations personnelles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <!--Alimentaires-->
            <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Mes habitudes alimentaires</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="habitudes_alimentaires">
                <?php $interets = Interets::habitudes_alimentaires()?>
                <?php if(!$interets[0]):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($interets[1] as $interet):?>
                        <input 
                            type="checkbox" 
                            name="interets[]" 
                            class="btn-check" 
                            id="<?= $interet->id_interet ?>" 
                            value="<?= $interet->id_interet ?>"
                            <?php if(in_array($interet->id_interet, $mes_interet_list)){echo 'checked';}?>
                        >
                        <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>

            <!--centres intérêts-->
            <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Mes centres intérêts</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="centres_interets">
                <?php $interets = Interets::centres_interets()?>
                <?php if(!$interets[0]):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu ! <?= $interets[1]?></div>
                <?php else :?>
                    <?php foreach($interets[1] as $interet):?>
                        <input 
                            type="checkbox" 
                            name="interets[]" 
                            class="btn-check" 
                            id="<?= $interet->id_interet ?>" 
                            value="<?= $interet->id_interet ?>"
                            <?php if(in_array($interet->id_interet, $mes_interet_list)){echo 'checked';}?>
                        >
                        <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
            <!--Personnalites-->
            <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Ma personnalité</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="personnalite">
                <?php $interets = Interets::personnalite()?>
                <?php if(!$interets[0]):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($interets[1] as $interet):?>
                        <input 
                            type="checkbox" 
                            name="interets[]" 
                            class="btn-check" 
                            id="<?= $interet->id_interet ?>" 
                            value="<?= $interet->id_interet ?>"
                            <?php if(in_array($interet->id_interet, $mes_interet_list)){echo 'checked';}?>
                        >
                        <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>

            <!--Style de vie-->
            <div class="mt-4 mb-4 bg-light">
                <div class="col border-one ps-1">
                    <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">Style de vie</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap interets_ajax" role="group" aria-label="Basic checkbox toggle button group" id="style_vie">
                <?php $interets = Interets::style_vie()?>
                <?php if(!$interets[0]):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($interets[1] as $interet):?>
                        <input 
                            type="checkbox" 
                            name="interets[]" 
                            class="btn-check" 
                            id="<?= $interet->id_interet ?>" 
                            value="<?= $interet->id_interet ?>"
                            <?php if(in_array($interet->id_interet, $mes_interet_list)){echo 'checked';}?>
                        >
                        <label class="btn btn-outline-success me-2 mb-2" for="<?= $interet->id_interet ?>">#<?= $interet->libelle_interet ?></label>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save_edit_interets" class="btn btn-success" name="save_edit_interets">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
