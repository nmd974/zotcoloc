<div class="d-flex flex-column justify-content-center align-items-center unshow_step" id="annonceNav_content">
<?php require_once(dirname(dirname(__DIR__)).'/class/Recherches.php');?>
<?php $annonces = Recherches::annonceByUserId($_SESSION['id_utilisateur']); ?>

<?php if(!$annonces[0] && count($annonces[1][0]) == 0):?>

        <img src="../images/no-annonce.png" class="img_moncompte">
        <button class="btn btn-success mt-4 w-25">Ajouter une annonce</button>

<?php else:?>
<div class="d-flex justify-content-center flex-wrap view-details">
                    <!-- ////////////////////////carte d'une annonce///////////////////// -->
            <?php if(!$annonces[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
            <?php else :?>
                <?php foreach($annonces[1] as $annonce):?>
                
                    <div class="m-2 mb-4">
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
                            <?php $utilisateurs = Recherches::photo_utilisateur($annonce->id_utilisateur)?>
                                <?php if(!$utilisateurs[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($utilisateurs[1] as $utilisateur):?>
                                <img src="../images/<?= $utilisateur->libelle_photo ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
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

                               <?php $images = Recherches::photo_annonce($annonce->id_chambre)?>
                                <?php if(!$images[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($images[1] as $image):?>
                                    <div class="carousel-item active">
                                        <img src="../images/<?= $image->libelle_photo ?>" class="d-block w-100" alt="room">
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                  
                                </div>
                            </div>
                            <!-- descriptif de l'annonce -->
                            <div class="card-body">
                            <a href="editAnnoncePage.php?id=<?= $annonce->id_chambre ?>" class="mode-link">
                            <!-- role -->
                                <span class="badge bg-primary mb-1 letter-space"><?= $annonce->libelle_role ?></span>
                                <!-- titre de l'annonce -->
                                <h5 class="card-title"><?= $annonce->titre_chambre ?></h5>
                                <p class="card-text"><?= $annonce->libelle_ville ?></p>
                                <!-- <p class="card-text">Chambre: 1</p> -->
                                <p class="card-text"><?= $annonce->date_disponibilite ?></p>
                                <p class="card-text"><span class="fw-bold h4"><?= $annonce->loyer ?> €</span> par mois</p>
                                <input type="text" name="room" value="" hidden>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                        <!-- fin d'une carte -->
         
                </div>
                <?php endif;?>
                </div>