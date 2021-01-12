 <?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?> 

<div id="wrapper_page_content">

<section class="container-fluid margin-search">
        <div class="row">
            <div class="col-6">
                <!-- barre de recherche -->
                <div class="input-border bg-light mb-3 input-filter">
                    <form action="" method="post" class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control location-border2" placeholder="Lieux"
                                aria-label="location" aria-describedby="button-addon1">
                            <button class="btn btn-outline-secondary w-25 bg-green text-white btn-radius" type="submit"
                                id="button-addon2">Recherche</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3 p-0 mt-1 d-flex justify-content-around">
                <!-- bouton filtre du loyer -->


                <div class="dropdown">
                    <button class="btn btn-light " type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Loyer
                    </button>

                    <div class="dropdown-menu p-4 dropdown-rent">
                        <form action="" method="get">
                            <p><span class="h5">Budget</span> /mois</p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0"><span id="price-value"></span> €</p>
                                <p>2000+ €</p>
                            </div>
                            <label for="price-range" class="form-label"></label>
                            <input type="range" class="form-range" min="0" max="2000" step="50" value="0"
                                id="price-range">
                            <div class="text-center">
                                <input class="btn btn-success" type="reset" value="Effacer">
                                <input class="btn btn-success" type="submit" value="Appliquer">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light" type="button" id="dropdownMenu3" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Type
                    </button>
                    <div class="dropdown-menu p-4 dropdown-type" type="button">
                        <form action="" method="get">
                            <p class="h5 mb-4">Type d'annonceur</p>
                            <select class="form-select mb-4" aria-label="Default select">
                                <option value="1">Tout</option>
                                <option value="2">Propriétaire</option>
                                <option value="3">Résidence</option>
                                <option value="4">Colocataire</option>
                                <option value="4">Agence</option>
                                <option value="4">Coliving</option>
                            </select>
                            <div class="text-center">
                                <input class="btn btn-success" type="reset" value="Effacer">
                                <input class="btn btn-success" type="submit" value="Appliquer">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light " type="button" id="dropdownMenu4" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Disponibilité
                    </button>

                    <div class="dropdown-menu p-4 dropdown-availability">
                        <form action="" method="get">
                            
                           <input type="date" name="date" id="" class="form-control mb-4">
                           
                            <p class="h5">Durée</p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0"><span id="availability-value"></span> Mois</p>
                                <p>24+ Mois€</p>
                            </div>
                            <label for="availability-range" class="form-label"></label>
                            <input type="range" class="form-range" min="1" max="24" step="1" value="1"
                                id="availability-range">
                            <div class="text-center">
                                <input class="btn btn-success" type="reset" value="Effacer">
                                <input class="btn btn-success" type="submit" value="Appliquer">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light " type="button" id="dropdownMenu5" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Plus de filtres
                    </button>

                    <div class="dropdown-menu p-4 dropdown-filter">
                        <form action="" method="get">
                            <p class="h5">Equipement</p>
                            <input type="checkbox" class="btn-check" id="btn-check1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btn-check1">Checkbox 1</label>
                            <hr class="dropdown-divider">
                            <p class="h5">Règles</p>
                            <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btn-check2">Checkbox 2</label>
                            <hr class="dropdown-divider">
                            <div class="d-flex justify-content-between">
                            <p class="h5">Chambres disponibles</p>
                            <input type="number" min="1" max="10" value="1" class="form-control number-room">
                        </div>
                            <div class="text-center">
                                <input class="btn btn-success" type="reset" value="Effacer">
                                <input class="btn btn-success" type="submit" value="Appliquer">
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>


        <div class="row">
            <div class="col-6">
                <div id="map"></div>
            </div>
            <div class="col-6 overlay">
                <!-- titre -->
                <div class="mb-5">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">RESULTATS</p>
                            <h2 class="vidaloka m-0 h2">2<span class="text-green"> résultats</span> pour votre recherche
                            </h2>
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-center">
                    <!-- carte d'une annonce///////// -->
                    <div class="ms-2 me-2">
                        <div class="card card-relative shadow-lg border " style="width: 18rem;">
                            <!-- icon coeur en position absolute-->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </div>
                            <!-- avatar en position absolute -->
                            <div class="avatar bg-danger d-flex justify-content-center align-items-center">
                                <img src="../images/profile.jpg" class="rounded-circle" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                            </div>
                            <!-- caroussel -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active">
                                    </li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../images/bright-hotel-room-bed.jpg" class="d-block w-100" alt="room">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../images/brightly-lit-room-with-piano.jpg" class="d-block w-100"
                                            alt="room">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../images/hotel-room-bed.jpg" class="d-block w-100" alt="room">
                                    </div>
                                </div>
                            </div>
                            <!-- descriptif de l'annonce -->
                            <div class="card-body">
                                <span class="badge bg-primary mb-1">Propriétaire</span>
                                <h5 class="card-title">title (adresse)</h5>
                                <p class="card-text">Chambre: 1</p>
                                <p class="card-text">Dispo. immédiatement</p>
                                <p class="card-text"><span class="fw-bold h4">500 €</span> par mois</p>
                            </div>
                        </div>
                    </div>
                    <div class="ms-2 me-2">
                        <div class="card card-relative shadow-lg border " style="width: 18rem;">
                            <!-- icon coeur en position absolute-->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-heart heart" viewBox="0 0 16 16">
                                    <path
                                        d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                </svg>
                            </div>
                            <!-- avatar en position absolute -->
                            <div class="avatar d-flex justify-content-center align-items-center">
                                <img src="../images/profile.jpg" class="rounded-circle" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                            </div>
                            <!-- caroussel -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active">
                                    </li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../images/bright-hotel-room-bed.jpg" class="d-block w-100" alt="room">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../images/brightly-lit-room-with-piano.jpg" class="d-block w-100"
                                            alt="room">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../images/hotel-room-bed.jpg" class="d-block w-100" alt="room">
                                    </div>
                                </div>
                            </div>
                            <!-- descriptif de l'annonce -->
                            <div class="card-body">
                                <span class="badge bg-primary mb-1">Propriétaire</span>
                                <h5 class="card-title">title (adresse)</h5>
                                <p class="card-text">Chambre: 1</p>
                                <p class="card-text">Dispo. immédiatement</p>
                                <p class="card-text"><span class="fw-bold h4">500 €</span> par mois</p>
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
<script src="../js/map.js"></script>
<script src="../js/range.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>