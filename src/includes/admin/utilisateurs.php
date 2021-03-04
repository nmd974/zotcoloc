<div class="d-flex flex-column justify-content-center align-lg-items-center unshow_step shadow" id="utilisateurs_tab_content">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-eqt-tab" data-bs-toggle="tab" data-bs-target="#nav-eqt" type="button" role="tab" aria-controls="nav-eqt" aria-selected="true">Equipements</button>
            <button class="nav-link" id="nav-regles-tab" data-bs-toggle="tab" data-bs-target="#nav-regles" type="button" role="tab" aria-controls="nav-regles" aria-selected="false">Règles</button>
            <button class="nav-link" id="nav-villes-tab" data-bs-toggle="tab" data-bs-target="#nav-villes" type="button" role="tab" aria-controls="nav-villes" aria-selected="false">Villes</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-eqt" role="tabpanel" aria-labelledby="nav-eqt-tab">
            <button type="button" class="btn btn-success me-4 mt-5" data-bs-toggle="modal" data-bs-target="#create_eqt">
                <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un équipement
            </button>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nom de l'équipement</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($equipements) != 0):?>
                        <?php foreach($equipements as $equipement):?>
                        <tr>
                            <td class="align-middle"><?= ucfirst($equipement->libelle_equipement) ?></td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#<?= "edit_eqt_" . $equipement->id?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#<?= "delete_eqt_" . $equipement->id?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td class="align-middle" colspan="2">Vous n'avez pas d'équipements enregistrés</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-regles" role="tabpanel" aria-labelledby="nav-regles-tab">
            <button type="button" class="btn btn-success me-4 mt-5" data-bs-toggle="modal" data-bs-target="#create_regle">
                <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une règle
            </button>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nom de la règle</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($regles) != 0):?>
                        <?php foreach($regles as $regle):?>
                        <tr>
                            <td class="align-middle"><?= ucfirst($regle->libelle_regle) ?></td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#<?= "edit_regle" . $regle->id?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#<?= "delete_regle" . $regle->id?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td class="align-middle" colspan="2">Vous n'avez pas de règles enregistrées</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-villes" role="tabpanel" aria-labelledby="nav-villes-tab">
            <button type="button" class="btn btn-success me-4 mt-5" data-bs-toggle="modal" data-bs-target="#create_ville">
                <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une ville
            </button>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nom de la ville</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($villes) != 0):?>
                        <?php foreach($villes as $ville):?>
                        <tr>
                            <td class="align-middle"><?= ucfirst($ville->libelle_ville) ?></td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#<?= "edit_ville" . $ville->id?>">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#<?= "delete_ville" . $ville->id?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td class="align-middle" colspan="2">Vous n'avez pas de villes enregistrées</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>