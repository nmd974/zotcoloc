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