<?php if(empty($_GET["id"])){
    header('Location: roommateSearch.php');
    }?>
<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/class/Recherches.php');?>

<?php $annonces = Recherches::annonce_details(htmlEntities($_GET["id"]))?>
        
<?php if(!$annonces[0]):?>
<div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
<?php else :?>

<div id="wrapper_page_content">
<section class="container">
            <!-- carousel -->
        <div class="d-flex justify-content-center align-items-center">
        <div class="carousel-style ">
            <div id="carouselExampleIndicators" class="carousel mt-1 slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <?php $images = Recherches::photo_annonce(htmlEntities($annonces[1]->id_chambre))?>
                                <?php if(!$images[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($images[1] as $image):?>
                                    <div class="carousel-item active">
                                        <img src="../images/<?= htmlEntities($image->libelle_photo) ?>" class="d-block w-100" alt="room">
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                    
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précedent</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </a>
            </div>
        </div>
    </div>


    </section> 
    <section class="container">
        <div class="row">
        
                
                
            <div class="col-lg-8 col-md-12">
                <!-- titre -->
                <div class="mb-5 mt-4">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">DETAILS</p>
                            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> de la chambre</span></h2>
                        </div>
                    </div>
                </div>
                
                <p class="h3"><?= htmlEntities($annonces[1]->titre_chambre) ?></p>
                <div class="d-flex">
                
                <p class="h6 mt-3"> Chambre - <span class="fw-bold"><?= htmlEntities($annonces[1]->surface_chambre) ?>m<sup>2</sup></span></p>
                
                </div>
                <p class="h6 mt-3"><?= htmlEntities($annonces[1]->description_chambre) ?>
                </p>
                <!-- avatar -->
                <div class="d-flex align-items-center mt-3 mb-4">
                <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                <?php $utilisateurs = Recherches::photo_utilisateur(htmlEntities($annonces[1]->id_utilisateur))?>
                                <?php if(!$utilisateurs[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($utilisateurs[1] as $utilisateur):?>
                                <img src="../images/<?= htmlEntities($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                                <?php endforeach; ?>
                                    <?php endif; ?>
                            
                </div>
                <div class="ms-3">
                <p class="fw-bold mb-0"><?= htmlEntities($annonces[1]->prenom) ?></p>
                <p class="mb-0"><?= htmlEntities($annonces[1]->libelle_role) ?></p>
                </div>
                </div>
               
                           <!-- titre -->
                <div class="mb-5 mt-3">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">EQUIPEMENTS</p>
                            <h2 class="vidaloka m-0 h1">Equipements<span class="text-green"> de la chambre</span></h2>
                        </div>
                    </div>
                </div>
                <h4 class="text-green h4 mb-4">Chambre</h4>
                <?php $equipements = Recherches::equipementChambre(htmlEntities($annonces[1]->id_chambre))?>
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
                </div> -->
                <hr>
                <!-- titre logement-->
                <div class="mb-5 mt-4">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">DETAILS</p>
                            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> du logement</span></h2>
                        </div>
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
                
                </div>
            </div>
            <!-- ---------------------------------------------------------- -->
            <div class="col-md-12 col-lg-4 position-relative">
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
                    <button type="button" class="btn bg-green text-light fw-bold letter-space mt-5" data-bs-toggle="modal" data-bs-target="#modal-contact">
                    LOUER CETTE CHAMBRE
                    </button>
                    <!-- <a href="#" class="btn bg-green text-light fw-bold letter-space mt-5">LOUER CETTE CHAMBRE</a> -->
                </div>
                <div class="card-footer text-muted">
                Petit mot ici si nécessaire
                </div>
                </div>
                </div>
            </div>
            
            <?php endif; ?>
            <!-- Modal -->
            <div class="modal fade" id="modal-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ms-2">
                        <div class="d-flex justify-content-around">
                        <div class="d-flex justify-content-start align-items-center mb-3 mt-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill text-green" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                        </div>
                        <div>
                            <a href="tel:<?= htmlEntities($annonces[1]->telephone) ?> "class="ms-3">Téléphone</a>
                        </div>
                        </div> 
                        <div class="d-flex justify-content-start align-items-center mb-3 mt-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill text-green" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                        </div>
                        <div>
                            <a href="mailto:<?= htmlEntities($annonces[1]->email) ?>" class="ms-3">Email</a>
                        </div>
                        </div> 
                        </div>
                    </div>
                
                </div>
            </div>
            </div>
        </div>
    </section>  
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
crossorigin=""></script>
<script src="../js/mapdetails.js"></script>
<script src="../js/swiper.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>