<div class="d-flex flex-column justify-content-center align-lg-items-center unshow_step shadow" id="utilisateurs_tab_content">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-particulier-tab" data-bs-toggle="tab" data-bs-target="#nav-particulier" type="button" role="tab" aria-controls="nav-particulier" aria-selected="true">Particuliers</button>
            <button class="nav-link" id="nav-proprietaire-tab" data-bs-toggle="tab" data-bs-target="#nav-proprietaire" type="button" role="tab" aria-controls="nav-proprietaire" aria-selected="false">Propriétaires</button>
        </div>
    </nav>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="nav-particulier" role="tabpanel" aria-labelledby="nav-particulier-tab">
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($particuliers) != 0):?>
                        <?php foreach($particuliers as $particulier):?>
                        <tr>
                            <td class="align-middle"><?= ucfirst($particulier->nom) ?></td>
                            <td class="align-middle"><?= ucfirst($particulier->prenom) ?></td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#<?= "delete_particulier_" . $particulier->id_particulier?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td class="align-middle" colspan="3">Vous n'avez pas d'utilisateurs sur le profil particulier</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-proprietaire" role="tabpanel" aria-labelledby="nav-proprietaire-tab">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($proprietaires) != 0):?>
                    <?php foreach($proprietaires as $proprietaire):?>
                    <tr>
                        <td class="align-middle"><?= ucfirst($proprietaire->nom) ?></td>
                        <td class="align-middle"><?= ucfirst($proprietaire->prenom) ?></td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#<?= "delete_proprietaire_" . $proprietaire->id_proprietaire?>">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                    <tr>
                        <td class="align-middle" colspan="3">Vous n'avez pas d'utilisateurs sur le profil propriétaire</td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</div>