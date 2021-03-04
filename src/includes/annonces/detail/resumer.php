<!-- card avec le bouton pour louer -->
<div class="pt-5 sticky-md-top mb-4">
                <div class="card text-center mt-4  mb-4 shadow">
                    <div class="card-header">
                    <p class="m-0">Dispo. <span class="fw-bold">immédiatement</span></p>  
                    </div>
                    <div class="card-body p-5">
                    <p class="fw-bold text-start">Chambre <?= htmlEntities($annonces[1]->surface_chambre) ?>m<sup>2</sup></p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="">Disponibilité</p>
                    <p class="fw-bold"><?= htmlEntities($annonces[1]->date_disponibilite) ?></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Durée</p>
                    <p class="fw-bold m-0"><?= htmlEntities($annonces[1]->duree_bail) ?> mois</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="">Caution</p>
                    <p class="fw-bold"><?= htmlEntities($annonces[1]->caution) ?> €</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="">Frais de dossier</p>
                    <p class="fw-bold"><?= htmlEntities($annonces[1]->frais_dossier) ?> €</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="">Charges</p>
                    <p class="fw-bold"><?= htmlEntities($annonces[1]->charges) ?> €</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">Loyer</p>
                    <p class="fw-bold h3 m-0"><?= htmlEntities($annonces[1]->loyer) ?> €</p>
                    </div>
                    <!-- Button trigger modal -->
                    <?php if($annonces[1]->id_utilisateur == $_SESSION['id_utilisateur']):?>
                        <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#editLogement">
                        Modifier le logement <i class="fa fa-pencil mx-2" aria-hidden="true"></i>
                        </button>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#editChambre">
                        Modifier la chambre <i class="fa fa-pencil mx-2" aria-hidden="true"></i>
                        </button>
                        </div>
                    <?php else:?>
                        <?php if($_SESSION['isLoggedIn']):?>
                            <button type="button" class="btn bg-green text-light fw-bold letter-space mt-5" data-bs-toggle="modal" data-bs-target="#modal-contact">
                            LOUER CETTE CHAMBRE
                            </button>
                        <?php else:?>
                            <p class="mt-5"><a href="../pages/seconnecter.php">Connectez vous</a> <br> pour contacter le propriétaire</p>
                        <?php endif;?> 
                    <?php endif;?>
                    <!-- <a href="#" class="btn bg-green text-light fw-bold letter-space mt-5">LOUER CETTE CHAMBRE</a> -->
                </div>
                <div class="card-footer text-muted">
                Petit mot ici si nécessaire
                </div>
                </div>
                </div>