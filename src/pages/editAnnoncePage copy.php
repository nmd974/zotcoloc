<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(dirname(__DIR__).'/class/Recherches.php');?>
<?php require_once(dirname(__DIR__).'/class/Photos.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editLogement.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editChambre.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editPhotoLogement.php');?>
<?php require_once(dirname(__DIR__).'/includes/compteProprietaire/modals/editPhotoChambre.php');?>

<?php $annonces = Recherches::annonce_details($_GET["id"])?>
<?php if(!$annonces[0]):?>
<div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
<?php else :?>
<div id="wrapper_page_content">
    <section class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="carousel-style ">
                <div id="carouselExampleIndicators" class="carousel mt-1 slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php $images = Recherches::photo_annonce($annonces[1]->id_chambre)?>
                        <?php if(!$images[0]):?>
                        <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                        <?php else :?>
                        <?php foreach($images[1] as $image):?>
                        <div class="carousel-item active">
                            <img src="../images/<?= $image->libelle_photo ?>" class="d-block w-100" alt="room" style="height:190px;">
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précedent</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="next">
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
                    <div class="border-one ps-1 d-flex justify-content-between">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">DETAILS</p>
                            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> de la chambre</span></h2>
                        </div>
                        <div class="d-flex mt-4">
                            <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#editChambre">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-success" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhotoChambre">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <p class="h3">
                    <?= $annonces[1]->titre_chambre ?>
                </p>
                <div class="d-flex flex-wrap justify-content-around">

                    <p class="h6"> Chambre - <span class="fw-bold">
                            <?= $annonces[1]->surface_chambre ?>m<sup>2</sup>
                        </span></p>

                </div>
                <p class="h6 mt-3">
                    <?= $annonces[1]->description_chambre ?>
                    <!-- Le logement est localisé dans le quartier Hôtel de Ville - Presqu'île, en plein centre de Lyon. De nombreux commerces, restaurants, transports publics sont aux environs. La colocation est à l'étage 4 avec ascenseur. Elle est entièrement meublée et propose une cuisine 100% équipée avec réfrigérateur, micro-ondes, poêles, casseroles, ustensiles, bouilloire, grille-pain, vaisselle… Ainsi que planche à repasser, tancarville, fer à repasser, lave-linge. Tout le matériel pour le ménage est sur place dans cette colocation : aspirateur, balai, seau et serpillère, balai-brosse… Chaque colocation meublée Chez Nestor inclut toutes les charges : assurance habitation, taxe sur les ordures, charges de copropriété, électricité, wifi illimité, eau.” -->
                </p>
                <!-- avatar -->
                <div class="d-flex align-items-center mt-3 mb-4">
                    <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                        <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar"
                            style="width:60px;height: 60px; border-radius: 50%;">
                    </div>
                    <div class="ms-3">
                        <p class="fw-bold mb-0 text-danger">prenom</p>
                        <p class="mb-0">
                            <?= $annonces[1]->libelle_role ?>
                        </p>
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
                <div class="d-flex">
                    <!-- un équipement -->
                    <div
                        class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i>
                                <!--à enlever par la suite -->
                                <!-- <img src="" alt="name">  on rajoute ensuite-->
                            </div>
                            <div class="d-flex align-items-center ms-2">
                                <p class="mb-0">Equipement du logement</p>
                            </div>
                        </div>
                    </div>
                    <!-- un équipement -->
                    <div
                        class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i>
                                <!--à enlever par la suite -->
                                <!-- <img src="" alt="name">  on rajoute ensuite-->
                            </div>
                            <div class="d-flex align-items-center ms-2">
                                <p class="mb-0">Equipement du logement</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- titre logement-->

                <div class="mb-5 mt-4">
                    <div class="border-one ps-1 d-flex justify-content-between">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">DETAILS</p>
                            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> du logement</span></h2>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#editLogement">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-success" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhotoLogement">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <p class="h3">
                    <?= $annonces[1]->titre_logement ?>
                </p>
                <div class="d-flex flex-wrap justify-content-around">
                    <p class="h6"> <span class="fw-bold text-danger">5</span>- colocataires</p>
                    <p class="h6"> Logement - <span class="fw-bold">
                            <?= $annonces[1]->surface_logement ?>m<sup>2</sup>
                        </span></p>

                    <p class="h6 "> Catégorie - <span class="fw-bold text-danger">Maison</span></p>
                </div>
                <p class="h6 mt-3">
                    <?= $annonces[1]->description_logement ?>
                </p>

                <!-- titre -->
                <div class="mb-5 mt-4">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">EQUIPEMENTS</p>
                            <h2 class="vidaloka m-0 h1">Equipements<span class="text-green"> de la chambre</span></h2>
                        </div>
                    </div>
                </div>

                <h4 class="text-green h4 mb-4 mt-3">Logement</h4>
                <div class="d-flex">
                    <!-- un équipement -->
                    <div
                        class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i>
                                <!--à enlever par la suite -->
                                <!-- <img src="" alt="name">  on rajoute ensuite-->
                            </div>
                            <div class="d-flex align-items-center ms-2">
                                <p class="mb-0">Equipement du logement</p>
                            </div>
                        </div>
                    </div>
                    <!-- un équipement -->
                    <div
                        class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i>
                                <!--à enlever par la suite -->
                                <!-- <img src="" alt="name">  on rajoute ensuite-->
                            </div>
                            <div class="d-flex align-items-center ms-2">
                                <p class="mb-0">Equipement du logement</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- section colocataire du logement -->
                <h4 class="text-green h4 mb-4 mt-3">Colocataires</h4>
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="d-flex flex-column align-items-center ms-4 me-4">
                        <p class="mb-0">Chambre 1</p>
                        <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                            <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar"
                                style="width:60px;height: 60px; border-radius: 50%;">
                        </div>
                        <p class="text-uppercase mb-0">isabelle</p>
                        <p class="text-green">21 ans</p>
                    </div>

                    <div class="d-flex flex-column align-items-center ms-4 me-4">
                        <p class="mb-0">Chambre 2</p>
                        <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                            <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar"
                                style="width:60px;height: 60px; border-radius: 50%;">
                        </div>
                        <p class="text-uppercase mb-0">isabelle</p>
                        <p class="text-green">21 ans</p>
                    </div>

                    <div class="d-flex flex-column align-items-center ms-4 me-4">
                        <p class="mb-0">Chambre 3</p>
                        <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                            <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar"
                                style="width:60px;height: 60px; border-radius: 50%;">
                        </div>
                        <p class="text-uppercase mb-0"></p>
                        <p class="text-green">Disponible</p>
                    </div>

                    <div class="d-flex flex-column align-items-center ms-4 me-4">
                        <p class="mb-0">Chambre 4</p>
                        <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                            <img src="../images/profile.jpg" class="rounded-circle shadow-sm p-1" alt="avatar"
                                style="width:60px;height: 60px; border-radius: 50%;">
                        </div>
                        <p class="text-uppercase mb-0"></p>
                        <p class="text-green">Disponible</p>
                        <button type="button" class="btn btn-outline-secondary btn-sm">Visiter</button>
                    </div>

                </div>

                <h4 class="text-green h4 mb-4 mt-3">Explorer ce logement</h4>
                <div class="img-wrapper mb-4">
                    <div class="img-one"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-two"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-three"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-four"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-five"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-six"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-six"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>
                    <div class="img-six"><img src="../images/bright-hotel-room-bed.jpg" alt="image" class="img-fluid">
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-lg-4 position-relative">
                <!-- card avec le bouton pour louer -->
                <div class="pt-5 sticky-md-top mb-4">
                    <div class="card text-center mt-4  mb-4 shadow">
                        <div class="card-header">
                            <p class="m-0">Dispo. <span class="fw-bold">immédiatement</span></p>
                        </div>
                        <div class="card-body p-5">


                            <p class="fw-bold text-start">Chambre
                                <?= $annonces[1]->surface_chambre ?>m<sup>2</sup>
                            </p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Disponibilité</p>
                                <p class="fw-bold">
                                    <?= $annonces[1]->date_disponibilite ?>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0">Durée</p>
                                <p class="fw-bold m-0">
                                    <?= $annonces[1]->duree_bail ?> mois
                                </p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">Charges</p>
                                <p class="fw-bold">
                                    <?= $annonces[1]->charges ?> €
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0">Loyer</p>
                                <p class="fw-bold h3 m-0">
                                    <?= $annonces[1]->loyer ?> €
                                </p>
                            </div>
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
                            <!-- <a href="#" class="btn bg-green text-light fw-bold letter-space mt-5">LOUER CETTE CHAMBRE</a> -->
                        </div>
                        <div class="card-footer text-muted">
                            Petit mot ici si nécessaire
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>
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