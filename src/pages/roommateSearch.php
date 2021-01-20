 <?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?> 
 <?php require_once(dirname(__DIR__).'/class/Recherches.php');?>
 <?php if(isset($_GET["btn-search"])){
    $annonces = Recherches::recherche_annonce(htmlEntities($_GET["search-room"]));
    $nombres = Recherches::nombre_annonce(htmlEntities($_GET["search-room"]));
 } 
  ?>

<div id="wrapper_page_content">

<section class="container-fluid margin-search">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- barre de recherche -->
                <div class="input-border bg-light mb-3 input-filter">
                    <form method="get" class="form-group">
                        <div class="input-group">
                            <input type="text" name="search-room" class="form-control location-border2" placeholder="Lieux"
                                aria-label="location" aria-describedby="button-addon1" id="search" list="datalistOptions" autocomplete="off">
                                <datalist id="datalistOptions"> 
                                
                                <?php $liste_villes = Recherches::listVille()?>
                                <?php if(!$liste_villes[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($liste_villes[1] as $liste_ville):?>
                                        <option value="<?=$liste_ville->libelle_ville?>">
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </datalist>
                                
                               
                                <div class="result" id="result-search"></div>
                                
                            <button class="btn btn-outline-secondary w-25 bg-green text-white btn-radius ms-1" type="submit"
                                id="button-addon2" name="btn-search">Recherche</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-lg-4  p-0 mt-1 d-flex flex-wrap text-start">
                <!-- bouton filtre du loyer -->
                <!-- barre de recherche -->
                <!-- <div class="dropdown ms-1 me-1">
                    <button class="btn btn-light btn-hidden" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Loyer
                    </button>
                    <div class="dropdown-menu p-4 dropdown-rent">
                        <form action="" method="get">
                            <p>Budget/mois</p>
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
                </div> -->
                <!-- bouton filtre type -->
                <!-- <div class="dropdown ms-1 me-1">
                    <button class="btn btn-light btn-hidden" type="button" id="dropdownMenu3" data-bs-toggle="dropdown"
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
                    </div> -->
                <!-- </div> -->
                <!-- bouton filtre disponibilité -->
                <!-- <div class="dropdown ms-1 me-1">
                    <button class="btn btn-light btn-hidden" type="button" id="dropdownMenu4" data-bs-toggle="dropdown"
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
                </div> -->
                <!-- bouton plus de filtre -->
                 <!-- <div class="dropdown ms-1 me-1"> -->
                    <!-- <button class="btn btn-light btn-hidden" type="button" id="dropdownMenu5" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Plus de filtres
                    </button>
                    <div class="dropdown-menu p-4 dropdown-filter">
                        <form action="" method="get">

                            <p class="h5 mb-3">Equipement</p>
                            <div class="d-flex flex-wrap"> -->

                            <!-- items -->
                           <!-- <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check1" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check1"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div> -->

                            <!-- items -->
                            <!-- <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check2"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div>

                            </div>

                            <hr class="dropdown-divider">
                            <p class="h5 mb-3">Règles</p>

                            <div class="d-flex flex-wrap"> -->

                            <!-- items -->
                            <!-- <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check3" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check3"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div> -->

                            <!-- items -->
                            <!-- <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check4" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check4"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div>
                            
                            </div>

                           
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
                </div>  -->
                
                    <!-- bouton modal loyer  version mobile -->
                <!-- Button trigger modal -->
                <!-- <button class="btn btn-light modal-btn ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Loyer
                </button> -->
                <!-- bouton modal plus de filtre  version mobile -->
                <!-- <button class="btn btn-light  modal-btn ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Plus de filtres
                </button> -->
                
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="exampleModalLabel">Loyer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="get">
                                            <p>Budget/mois</p>
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-0"><span id="price-value2"></span> €</p>
                                                <p>2000+ €</p>
                                            </div>
                                            <label for="price-range2" class="form-label"></label>
                                            <input type="range" class="form-range" min="0" max="2000" step="50" value="0"
                                                id="price-range2">           
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="exampleModalLabel2">Plus de filtres</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- disponibilité -->
                        <div class="modal-body">
                        <form action="" method="get"> 
                           <input type="date" name="date" id="" class="form-control mb-4">
                            <p class="h5">Durée</p>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0"><span id="availability-value2"></span> Mois</p>
                                <p>24+ Mois€</p>
                            </div>
                            <label for="availability-range2" class="form-label"></label>
                            <input type="range" class="form-range" min="1" max="24" step="1" value="1"
                                id="availability-range2">
                                <hr>
                            <!-- type -->
                            <p class="h5 mb-4">Type d'annonceur</p>
                            <select class="form-select mb-4" aria-label="Default select">
                                <option value="1">Tout</option>
                                <option value="2">Propriétaire</option>
                                <option value="3">Résidence</option>
                                <option value="4">Colocataire</option>
                                <option value="4">Agence</option>
                                <option value="4">Coliving</option>
                            </select>
                        
                            <hr>
                            <!-- equipement -->
                            <p class="h5">Equipement</p>

                            <div class="d-flex flex-wrap">

                            <!-- items -->
                            <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check1" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check1"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div>

                            <!-- items -->
                            <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check2"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div>

                            </div>
                            
                            <hr class="dropdown-divider">
                            <p class="h5">Règles</p>

                            <div class="d-flex flex-wrap">

                            <!-- items -->
                            <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check3" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check3"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div>

                            <!-- items -->
                            <div class="text-center ms-2 me-2">
                            <div>
                            <input type="checkbox" class="btn-check" id="btn-check4" autocomplete="off">
                            <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check4"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
                            </div> 
                            <p>salon</p>
                            </div>

                            </div>

                            <hr class="dropdown-divider">
                            <div class="d-flex justify-content-between">
                            <p class="h5">Chambres disponibles</p>
                            <input type="number" min="1" max="10" value="1" class="form-control number-room">

                        
                    </div>

                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                    </div>
                </div>
                </div>

            </div>

        </div>


        <div class="row bg-height">
        <!-- carte en commentaire pour la prochaine version -->
            <!-- la map -->
            <!-- <div class="col-lg-6 col-md-12 map-order mt-3">
                <div id="map"></div>
            </div> -->
            <div class="col-lg-12 col-md-12 card-order mt-3">
                <!-- titre -->
                <?php if(isset($_GET["btn-search"])):?>
                <div class="mb-5">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">RESULTATS</p>
                            <h2 class="vidaloka m-0 h2"><?php echo htmlEntities($nombres[1][0]["COUNT(*)"]);?><span class="text-green"> résultats</span> pour votre recherche
                            </h2>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <?php if(!isset($_GET["btn-search"])):?>
                    <?php $count = Recherches::count_annonce(); ?>
                   
                <div class="mb-5">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">ANNONCES</p>
                            <h2 class="vidaloka m-0 h2"><?php echo htmlEntities($count[1][0]["COUNT(*)"]);?><span class="text-green"> annonces</span> actuellement
                            </h2>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                </div>
                <div class="offset-2 col-8 d-flex justify-content-center flex-wrap view-details">
                    <!-- ////////////////////////carte d'une annonce///////////////////// -->
              <?php if(isset($_GET["btn-search"])):?>  
               
            <?php if(!$annonces[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
            <?php else :?>
                <?php foreach($annonces[1] as $annonce):?>
                
                    <div class="m-2 mb-4">
                    <a href="roommateDetails.php?id=<?= htmlEntities($annonce->id_chambre) ?>" class="mode-link">
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
                            <div class="avatar d-flex justify-content-center align-items-center bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                            <?php $utilisateurs = Recherches::photo_utilisateur(htmlEntities($annonce->id_utilisateur))?>
                                <?php if(!$utilisateurs[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($utilisateurs[1] as $utilisateur):?>
                                <img src="../images/<?= htmlEntities($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                                <?php endforeach; ?>
                                    <?php endif; ?>
                            </div>
                            <!-- caroussel -->
                            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active">
                                    </li>
                                    
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" >

                               <?php $images = Recherches::photo_annonce(htmlEntities($annonce->id_chambre))?>
                                <?php if(!$images[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($images[1] as $image):?>
                                    <div class="carousel-item active">
                                        <img src="../images/<?= htmlEntities($image->libelle_photo) ?>" class="d-block w-100 " alt="room" style="height:190px;">
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                  
                                </div>
                            </div>
                            <!-- descriptif de l'annonce -->
                            <div class="card-body">
                            
                            <!-- role -->
                                <span class="badge bg-primary mb-1 letter-space"><?= htmlEntities($annonce->libelle_role) ?></span>
                                <!-- titre de l'annonce -->
                                <h5 class="card-title"><?= htmlEntities($annonce->titre_chambre) ?></h5>
                                <p class="card-text"><?= htmlEntities($annonce->libelle_ville) ?></p>
                                <!-- <p class="card-text">Chambre: 1</p> -->
                                <p class="card-text"><?= htmlEntities($annonce->date_disponibilite) ?></p>
                                <p class="card-text"><span class="fw-bold h4"><?= htmlEntities($annonce->loyer) ?> €</span> par mois</p>
                                
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                        <!-- fin d'une carte -->
                            <!-- ////////////////////////carte d'une annonce///////////////////// -->
              <?php if(!isset($_GET["btn-search"])):?>  
                <?php $annonces = Recherches::all_annonce(); ?>
             <?php if(!$annonces[0]):?>
             <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
             <?php else :?>
                 <?php foreach($annonces[1] as $annonce):?>
                 
                     <div class="m-2 mb-4">
                     <a href="roommateDetails.php?id=<?= htmlEntities($annonce->id_chambre) ?>" class="mode-link">
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
                             <div class="avatar d-flex justify-content-center align-items-center bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
                             <?php $utilisateurs = Recherches::photo_utilisateur(htmlEntities($annonce->id_utilisateur))?>
                                 <?php if(!$utilisateurs[0]):?>
                                 <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                 <?php else :?>
                                     <?php foreach($utilisateurs[1] as $utilisateur):?>
                                 <img src="../images/<?= htmlEntities($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                                 <?php endforeach; ?>
                                     <?php endif; ?>
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
 
                                <?php $images = Recherches::photo_annonce(htmlEntities($annonce->id_chambre))?>
                                 <?php if(!$images[0]):?>
                                 <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                 <?php else :?>
                                     <?php foreach($images[1] as $image):?>
                                     <div class="carousel-item active">
                                         <img src="../images/<?= htmlEntities($image->libelle_photo) ?>" class="d-block w-100" alt="room" style="height:190px;">
                                     </div>
                                     <?php endforeach; ?>
                                     <?php endif; ?>
                                   
                                 </div>
                             </div>
                             <!-- descriptif de l'annonce -->
                             <div class="card-body">
                             
                             <!-- role -->
                                 <span class="badge bg-primary mb-1 letter-space"><?= htmlEntities($annonce->libelle_role) ?></span>
                                 <!-- titre de l'annonce -->
                                 <h5 class="card-title"><?= htmlEntities($annonce->titre_chambre) ?></h5>
                                 <p class="card-text"><?= htmlEntities($annonce->libelle_ville) ?></p>
                                 <!-- <p class="card-text">Chambre: 1</p> -->
                                 <p class="card-text"><?= htmlEntities($annonce->date_disponibilite) ?></p>
                                 <p class="card-text"><span class="fw-bold h4"><?= htmlEntities($annonce->loyer) ?> €</span> par mois</p>
                                
                                 </a>
                             </div>
                         </div>
                     </div>
                     <?php endforeach; ?>
                     <?php endif; ?>
                     <?php endif; ?>
                         <!-- fin d'une carte -->
         
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
<script src="../js/map.js"></script>
<script src="../js/range.js"></script>
<script src="../js/search.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>