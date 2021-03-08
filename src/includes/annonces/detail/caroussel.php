<div class="carousel-style">
    <div id="carouselExampleIndicators" class="carousel mt-1 slide" data-bs-ride="carousel">
        <?php $images = Recherches::photo_annonce(htmlspecialchars($annonces[1]->id_chambre))?>
        <?php var_dump($images);?>
        <?php if(!$images[0]):?>
            <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
        <?php else :?>
            <ol class="carousel-indicators">
                <?php for ($i=0; $i <= count($images[1]); $i++):?>
                    <?php if($i == 0):?>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <?php else:?>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>"></li>
                    <?php endif;?>
                <?php endfor;?>
            </ol>
            <div class="carousel-inner">
                <?php for ($i=0; $i <= count($images[1]); $i++):?>
                    <?php if($i == 0):?>
                        <div class="carousel-item active">
                            <img src="../images/<?= htmlspecialchars($image[1][$i]->libelle_photo) ?>" class="d-block w-100" alt="photo chambre">
                        </div>
                    <?php else:?>
                        <div class="carousel-item">
                            <img src="../images/<?= htmlspecialchars($image[1][$i]->libelle_photo) ?>" class="d-block w-100" alt="photo chambre">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        <?php endif;?>
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