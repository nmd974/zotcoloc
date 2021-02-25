                <!-- titre logement-->
                <div class="mb-5 mt-4">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">DETAILS</p>
                            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> du logement</span></h2>
                        </div>
                        <?php if($annonces[1]->id_utilisateur == $_SESSION['id_utilisateur']):?>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#editLogement">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-success" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhotoLogement">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </button>
                        </div>
                        <?php endif;?>
                    </div>
                </div>

                <p class="h3 mb-3"><?= htmlEntities($annonces[1]->titre_logement) ?></p>
                <div class="d-flex ">
                <!-- <p class="h6"> <span class="fw-bold text-danger">5</span>- colocataires</p> -->
                <p class="h6 me-5"> Logement - <span class="fw-bold"><?= htmlEntities($annonces[1]->surface_logement)?>m<sup>2</sup></span></p>
                
                <p class="h6 "> Catégorie - <span class="fw-bold"><?= htmlEntities($annonces[1]->type_logement)?></span></p>
                </div>
                <p class="h6 mt-3"><?= htmlEntities($annonces[1]->description_logement) ?></p>

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
                
                <?php $regles = Recherches::regleByRoomId(htmlEntities($annonces[1]->id_logement))?>
                                <?php if(!$regles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <div class="d-flex flex-wrap">
                                    <?php foreach($regles[1] as $regle):?>
                                    
                                      <p class="me-2"><span class="text-green">#</span><?= htmlEntities($regle->libelle_regle)?></p>
                                    
                                    <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                <hr>
                <!-- ------------------------------------------------------- -->
                <h4 class="text-green h4 mb-4 mt-3">Logement</h4>
                <?php $equipements = Recherches::equipementLogement(htmlEntities($annonces[1]->id_logement))?>
                                <?php if(!$equipements[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <div class="d-flex flex-wrap">
                                    <?php foreach($equipements[1] as $equipement):?>
                                    
                                      <p class="me-2"><span class="text-green">#</span><?= htmlEntities($equipement->libelle_equipement)?></p>
                                    
                                    <?php endforeach; ?>
                                    </div>
                                    <?php endif;?>

                <!-- <div class="d-flex">
                
                <div class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                        <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i>
                        
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <p class="mb-0">Equipement du logement</p>
                        </div>
                    </div>
                </div>
                
                <div class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                        <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i>
                        
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <p class="mb-0">Equipement du logement</p>
                        </div>
                    </div>
                </div>
                </div>  -->
                <hr>
                <!-- ---------------------------------------------------------- -->
                <!-- section colocataire du logement -->
                <!-- <h4 class="text-green h4 mb-4 mt-3">Colocataires</h4>
                <div class="d-flex justify-content-center flex-wrap">
                <div class="d-flex flex-column align-items-center ms-4 me-4">
                <p class="mb-0">Chambre 1</p>
                <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                    <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px;height: 60px; border-radius: 50%;">
                </div>
                <p class="text-uppercase mb-0">isabelle</p>
                <p class="text-green">21 ans</p>
                </div>

                <div class="d-flex flex-column align-items-center ms-4 me-4">
                <p class="mb-0">Chambre 2</p>
                <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                    <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px;height: 60px; border-radius: 50%;">
                </div>
                <p class="text-uppercase mb-0">isabelle</p>
                <p class="text-green">21 ans</p>
                </div>

                <div class="d-flex flex-column align-items-center ms-4 me-4">
                <p class="mb-0">Chambre 3</p>
                <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                    <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px;height: 60px; border-radius: 50%;">
                </div>
                <p class="text-uppercase mb-0"></p>
                <p class="text-green">Disponible</p>
                </div>

                <div class="d-flex flex-column align-items-center ms-4 me-4">
                <p class="mb-0">Chambre 4</p>
                <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                    <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px;height: 60px; border-radius: 50%;">
                </div>
                <p class="text-uppercase mb-0"></p>
                <p class="text-green">Disponible</p>
                <button type="button" class="btn btn-outline-secondary btn-sm">Visiter</button>
                </div>
                
                </div>
                <hr> -->
                <!-- <h4 class="text-green h4 mb-4 mt-3">Quartier</h4> -->
                <!-- map -->
                <!-- <div id="mapdetails">
                </div>
                <hr> -->
                <!-- -------------------------------------------------------------- -->
                <h4 class="text-green h4 mb-4 mt-3">Explorer ce logement</h4>
                <?php $photo_logements = Recherches::photoLogementById(htmlEntities($annonces[1]->id_logement))?>
                
                                <?php if(!$photo_logements[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($photo_logements[1] as $photo_logement):?>
                                    <div>
                                    
                                <img src="../images/<?= htmlEntities($photo_logement->libelle_photo) ?>" class="" alt="" style="width:60px; height: 60px;">
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                <div class="img-wrapper mb-4">
                <div class="img-one"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-two"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-three"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-four"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-five"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-six"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-six"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>
                <div class="img-six"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid"></div>