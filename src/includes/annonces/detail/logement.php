                <!-- titre logement-->
                <div class="mb-5 mt-4">
                    <div class="border-one ps-1 d-flex justify-content-between">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">DETAILS</p>
                            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> du logement</span></h2>
                        </div>
                        <?php if($annonces[1]->id_utilisateur == $_SESSION['id_utilisateur']):?>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#editLogement">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-success me-4" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhotoLogement">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </button>
                        </div>
                        <?php endif;?>
                    </div>
                </div>

                <p class="h3 mb-3"><?= htmlspecialchars($annonces[1]->titre_logement) ?></p>
                <div class="d-flex ">
                <!-- <p class="h6"> <span class="fw-bold text-danger">5</span>- colocataires</p> -->
                <p class="h6 me-5"> Logement - <span class="fw-bold"><?= htmlspecialchars($annonces[1]->surface_logement)?>m<sup>2</sup></span></p>
                
                <p class="h6 "> Catégorie - <span class="fw-bold"><?= htmlspecialchars($annonces[1]->type_logement)?></span></p>
                </div>
                <p class="h6 mt-3"><?= htmlspecialchars($annonces[1]->description_logement) ?></p>

                <!-- titre -->
                <div class="mb-5 mt-4">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">EQUIPEMENTS</p>
                            <h2 class="vidaloka m-0 h1">Equipements<span class="text-green"> du logement</span></h2>
                        </div>
                    </div>
                </div>
                <h4 class="text-green h4 mb-4 mt-3">Règles</h4>
                
                <?php $regles = Recherches::regleByRoomId(htmlspecialchars($annonces[1]->id_logement))?>
                                <?php if(!$regles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <div class="d-flex flex-wrap">
                                    <?php foreach($regles[1] as $regle):?>
                                    
                                      <p class="me-2"><span class="text-green">#</span><?= htmlspecialchars($regle->libelle_regle)?></p>
                                    
                                    <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                <hr>
                <!-- ------------------------------------------------------- -->
                <h4 class="text-green h4 mb-4 mt-3">Logement</h4>
                <?php $equipements = Recherches::equipementLogement(htmlspecialchars($annonces[1]->id_logement))?>
                                <?php if(!$equipements[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <div class="d-flex flex-wrap">
                                    <?php foreach($equipements[1] as $equipement):?>
                                    
                                      <p class="me-2"><span class="text-green">#</span><?= htmlspecialchars($equipement->libelle_equipement)?></p>
                                    
                                    <?php endforeach; ?>
                                    </div>
                                    <?php endif;?>
                <hr>

                <!-- -------------------------------------------------------------- -->
                <h4 class="text-green h4 mb-4 mt-3">Photo du logement</h4>
                <?php $photo_logements = Recherches::photoLogementById(htmlspecialchars($annonces[1]->id_logement))?>
                
                                <?php if(!$photo_logements[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($photo_logements[1] as $photo_logement):?>
                                    <div class="d-flex justify-content-center">
                                    
                                <img src="../images/<?= htmlspecialchars($photo_logement->libelle_photo) ?>" class="img-fluid" alt="image du logement">
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                <div class="img-wrapper mb-4">