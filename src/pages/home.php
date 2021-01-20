<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<?php require_once(__ROOT__.'/src/class/Statistiques.php');?>
<?php require_once(dirname(__DIR__).'/class/Recherches.php');?>
<?php if(isset($_GET["btn-search"])){
    $annonces = Recherches::recherche_annonce($_GET["search-room"]);
   
 } 
  ?>


<!-- titre + barre de recherche -->
<section class="main">
        <div class="row align-items-center h-100">
            <div>
                <div class="container">
                    <p class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt text-green" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg> Trouver une colocation à la <span class="text-green">Réunion</span> Réunion
                        Rapidement
                    </p>
                    <h1 class="display-3 text-white vidaloka">Zot<span class="text-green">Coloc</span> Réunion</h1>
                    <p class="text-white h5 mb-5">Service de colocation entre particulier, Agence et propriétaire</p>
                    <!-- barre de recherche -->
                    <div class="input-border bg-light" id="input-border">
                        <form action="roommateSearch.php" method="get" class="form-group">
                            <div class="input-group" id="input-group">
                                <input 
                                    type="text" 
                                    class="form-control w-25 location-border border-end-0" name="search-room" 
                                    placeholder="Ville recherchée" 
                                    id="search"
                                    aria-label="location" 
                                    aria-describedby="button-addon1"
                                    list="datalistOptions" 
                                    autocomplete="off"
                                    
                                >
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
                                <!-- <input type="text" class="form-control w-25 price-border" placeholder="Prix" id="price"
                                    aria-label="price" aria-describedby="button-addon2">
                                <select class="form-select w-25 category-border" aria-label="Default select example">
                                    <option selected>Catégorie</option>
                                    <option value="1">Appartement</option>
                                    <option value="2">Maison</option>
                                    <option value="3">Villa</option>
                                </select> -->
                                <button class="btn btn-outline-secondary w-25 bg-green text-white btn-radius"
                                    type="submit" id="button-addon2" name="btn-search">Recherche</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

        </div>


    </section>
    <!-- Statistique-->
    <section class="number-stat mb-5">
        <div class="container">
            <div class="row text-center">
                <div class=" d-flex justify-content-around align-items-center flex-wrap mt-3 mb-3">
                    <p class="h6"><span class="stat text-green fw-bold vidaloka">
                    <?php $nbrAnnonces = Statistiques::annonce_total()?>
                    <?php if(!$nbrAnnonces[0]):?>
                     <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                    <?php else :?>
                    <?php echo $nbrAnnonces[1][0]["COUNT(*)"];?>
                    <?php endif; ?>
                    </span><br>nbr Annonces </p>
                    <p class="h6"><span class="stat text-green fw-bold vidaloka">
                    <?php $nbrInscription = Statistiques::inscription_total()?>
                    <?php if(!$nbrInscription[0]):?>
                     <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                    <?php else :?>
                    <?php echo $nbrInscription[1][0]["COUNT(*)"];?>
                    <?php endif; ?></span><br>nbr inscrit</p>
                    <!-- <p class="h6"><span class="stat text-green fw-bold vidaloka">403</span><br>nbr de LOREM</p>
                    <p class="h6"><span class="stat text-green fw-bold vidaloka">1241</span><br>nbr LOREM</p> -->
                </div>
            </div>
        </div>
        
    </section>
    <!-- top ville -->
    <section class="container">
        <!-- titre -->
        <div class="mb-5 subtitle">
            <div class="border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">TOP VILLE</p>
                    <h2 class="vidaloka m-0 h1">Retrouver<span class="text-green"> nos meilleurs Colocation</span> de
                        la Réunion</h2>
                </div>
            </div>
        </div>
        <!-- gallerie d'images -->
        <div class="wrapper-photo">
            <!-- <div class="image-one position-relative">
                <img src="https://www.cartedelareunion.fr/wp-content/uploads/2019/03/Ile-de-La-Reunion-Saint-Denis.jpg"
                    alt="top-city" class="img-fluid img-cover">
                <p class="text-light vidaloka display-4 position-absolute top-50 start-50 translate-middle text-center">
                    St denis</p>
            </div>
            <div class="image-two position-relative">
                <img src="https://www.cartedelareunion.fr/wp-content/uploads/2016/03/Barachois-Saint-Denis-Ile-de-La-Reunion.jpg"
                    alt="top-city" class="img-fluid img-cover">
                <p class="text-light vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">St Paul
                </p>
            </div> -->
            
            
            <?php $topVilles = Statistiques::top_ville()?>
            <?php if(!$topVilles[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
            <?php else :?>

                <?php foreach($topVilles[1] as $topVille):?>

            <div class="image-three position-relative">
                <a href="roommateSearch.php?search-room=<?= $topVille->libelle_ville ?>&btn-search=" class="text-dark">
                <img src="https://www.cartedelareunion.fr/wp-content/uploads/2019/05/Terre-Sainte-plage-lagon-La-Reunion.jpg"
                    alt="top-city" class="img-fluid rounded" style="filter: grayscale(30%);">
                <p class="vidaloka h2 position-absolute top-50 start-50 translate-middle text-center"><?= $topVille->libelle_ville ?></p>
                </a>
            </div>
            
            <?php endforeach; ?>
            <?php endif; ?>
            <!-- <div class="image-six position-relative">
                <img src="https://www.cartedelareunion.fr/wp-content/uploads/2016/07/Plage-de-lErmitage-filaos-cartedelareunion.fr-%C2%A9-Serge-Gelabert-1102x800.jpg"
                    alt="top-city" class="img-fluid img-cover">
                <p class="text-light vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">Ste
                    Marie</p>
            </div> -->
            <!-- <div class="image-seven position-relative">
                <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-2.jpg" alt="top-city"
                    class="img-fluid img-cover">
                <p class="text-light vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">Ste
                    Suzanne</p>
            </div>
            <div class="image-eigth position-relative">
                <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-3.jpg" alt="top-city"
                    class="img-fluid img-cover">
                <p class="text-light vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">La
                    possession</p>
            </div>
            <div class="image-nine position-relative">
                <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-3.jpg" alt="top-city"
                    class="img-fluid img-cover">
                <p class="text-light vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">Le port
                </p>
            </div> -->

        </div>
    </section>

    <!-- par région -->
    <section class="container mt-5 mb-5">
        <div class="mb-5 subtitle">
            <div class="border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">PAR SECTEUR</p>
                    <h2 class="vidaloka m-0 h1">Par secteur<span class="text-green"> nos Colocations</span> de
                        la Réunion</h2>
                </div>
            </div>

        </div>
        <div class="row mb-5 vidaloka">

            <!--item-->
            <div class="col-md-3">
                    <div class="image-three position-relative">
                    
                       
                        <a href="roommateSearch.php?search-room=nord&btn-search=" class="text-white">
                            <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-1.jpg" alt="nord"
                                class="img-fluid rounded" style="filter: grayscale(30%)">
                            
                                <h3 class="vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">NORD
                            <!--stat pour région NORD-->
                            <?php $topVilles = Statistiques::stat_region()?>
                            <?php if(!$topVilles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                            <?php else :?>
                                <?php foreach($topVilles[1] as $topVille):?>

                                    <?php if($topVille->libelle_zone=="nord"):?>
                                    <?= $topVille->nb ?>
                                   <?php endif; ?>
                                    
            
                                <?php endforeach; ?>
                             <?php endif; ?>
                        </h3>    
                        </a>
                                
                       
                       
                    </div>
                    
                </div>


            <!-- Item-->
            <div class="col-md-3">
                    <div class="image-three position-relative">
                        
                        <a href="roommateSearch.php?search-room=sud&btn-search=" class="text-white">
                            <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-2.jpg" alt="sud"
                                class="img-fluid rounded" style="filter: grayscale(30%)">
                               
                        
                        <h3 class="vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">SUD
                            <!--stat pour région SUD-->
                            <?php $topVilles = Statistiques::stat_region()?>
                            <?php if(!$topVilles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                            <?php else :?>
                                <?php foreach($topVilles[1] as $topVille):?>

                                    <?php if($topVille->libelle_zone=="sud"):?>
                                    <?= $topVille->nb ?>
                                   <?php endif; ?>
                                    
            
                                <?php endforeach; ?>
                             <?php endif; ?>
                        </h3>
                        </a>
                    </div>
                </div>

            <!-- Item                    -->
             <div class="col-md-3">
                    <div class="image-three position-relative">
                    
                       
                        <a href="roommateSearch.php?search-room=est&btn-search=" class="text-white">
                            <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-1.jpg" alt="nord"
                                class="img-fluid rounded" style="filter: grayscale(30%)">
                            
                                <h3 class="vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">EST
                            <!--stat pour région NORD-->
                            <?php $topVilles = Statistiques::stat_region()?>
                            <?php if(!$topVilles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                            <?php else :?>
                                <?php foreach($topVilles[1] as $topVille):?>

                                    <?php if($topVille->libelle_zone=="est"):?>
                                    <?= $topVille->nb ?>
                                   <?php endif; ?>
                                    
            
                                <?php endforeach; ?>
                             <?php endif; ?>
                        </h3>    
                        </a>
                                
                       
                       
                    </div>
                    
                </div>

            <!-- Item                    -->
            <div class="col-md-3">
                    <div class="image-three position-relative">
                        
                        <a href="roommateSearch.php?search-room=ouest&btn-search=" class="text-white">
                            <img src="https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/photo-top-2.jpg" alt="sud"
                                class="img-fluid rounded" style="filter: grayscale(30%)">
                               
                        
                        <h3 class="vidaloka h2 position-absolute top-50 start-50 translate-middle text-center">OUEST
                            <!--stat pour région SUD-->
                            <?php $topVilles = Statistiques::stat_region()?>
                            <?php if(!$topVilles[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                            <?php else :?>
                                <?php foreach($topVilles[1] as $topVille):?>

                                    <?php if($topVille->libelle_zone=="ouest"):?>
                                    <?= $topVille->nb ?>
                                   <?php endif; ?>
                                    
            
                                <?php endforeach; ?>
                             <?php endif; ?>
                        </h3>
                        </a>
                    </div>
                </div>
    </section>

    <section class="container mb-5">
        <div class="mb-5 subtitle">
            <div class="col border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">INFORMATION</p>
                    <h2 class="vidaloka m-0 h1">Une chambre ou un appartement à <span class="text-green">
                            louer?</span></h2>
                </div>
            </div>

        </div>
        <div class="row mt-5">

            <!-- Item-->
            <div class="col-md-4">
                <div>
                    <div>
                        <img src="https://whoomies.com/img/publications/1.jpg" alt="information" class="img-fluid rounded">
                    </div>
                    <div class=" d-flex align-items-end">
                        <div>
                            <h4 class="mt-3 vidaloka">Dépôt d'annonce gratuit</h4>
                            <p>Diffusez votre annonce auprès d’une communauté en recherche active de logement et recevez
                                vos
                                premières candidatures.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item-->
            <div class="col-md-4">
                <div>
                    <div><img src="https://whoomies.com/img/publications/2.jpg" alt="information"
                            class="img-fluid rounded">
                    </div>
                    <div class=" d-flex align-items-end">
                        <div>
                            <h4 class="mt-3 vidaloka">Gérez vos candidatures</h4>
                            <p>Recevez vos candidatures, examinez les dossiers, et sélectionnez les candidats qui vous
                                correspondent
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item                    -->
            <div class="col-md-4">
                <div>
                    <div><img src="https://whoomies.com/img/publications/3.jpg" alt="information"
                            class="img-fluid rounded">
                    </div>
                    <div class=" d-flex align-items-end">
                        <div>
                            <h4 class="mt-3 vidaloka">Une équipe à votre écoute</h4>
                            <p>Avec notre positionnement unique centré sur l’humain, nos experts sélectionnent avec vous
                                les
                                meilleurs candidats possibles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>