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

                <?php //require_once(dirname(__DIR__).'/includes/rechercheAnnonce/boutonFiltre/filtrePrix.php');?>
                
                <!-- bouton filtre type -->

                <?php //require_once(dirname(__DIR__).'/includes/rechercheAnnonce/boutonFiltre/filtreType.php');?>
                
                
                <!-- bouton filtre disponibilité -->

                <?php //require_once(dirname(__DIR__).'/includes/rechercheAnnonce/boutonFiltre/filtreDisponibilite.php');?>

                <!-- bouton plus de filtre -->

                <?php //require_once(dirname(__DIR__).'/includes/rechercheAnnonce/boutonFiltre/filtrePlus.php');?>
                
                <!-- bouton modal loyer  version mobile -->
                <!-- Button trigger modal -->

                <?php //require_once(dirname(__DIR__).'/includes/rechercheAnnonce/modals/loyerMobile.php');?>
                
                
                

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
                    <!-- ////////////////////////affichage des annonces à partir d'une recherche///////////////////// -->
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
                            <!-- ////////////////////////affichage des annonces publiés///////////////////// -->
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