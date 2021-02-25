<?php if(!$annonces):?>
<img src="../images/no-logement.png" alt="pas de resultats" class="img-fluid">
<?php else :?>
<?php foreach($annonces as $annonce):?>
<?php $idChambre = htmlspecialchars($annonce->id_chambre,ENT_QUOTES); ?>
<?php $idUtilisateur = htmlspecialchars($annonce->id_utilisateur);?>

<?php include __ROOT__.'/src/controllers/annonces/recherches/getPhotos.php'?>

<div class="m-2 mb-4">
    <a href="roommateDetails.php?id=<?= htmlspecialchars($annonce->id_chambre) ?>" class="mode-link">
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
                
                <?php if(!$utilisateurs):?>
                    <?php if($annonce->libelle_role == "proprietaire"):?>
                        <img src="../images/no-picture-particulier.png" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                    <?php else:?>
                        <img src="../images/no-picture-particulier.png" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                    <?php endif;?>
                <?php else :?>
                <?php foreach($utilisateurs as $utilisateur):?>
                <img src="../images/<?= htmlspecialchars($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <?php if(!$images):?>
                <img src="../images/no-photo.png" class="d-block w-100" alt="room" style="height:190px;">
            <?php else :?>
                <?php foreach($images as $image):?>
                    <img src="../images/<?= htmlspecialchars($image->libelle_photo) ?>" class="d-block w-100" alt="room" style="height:190px;">
                <?php endforeach; ?>
            <?php endif; ?>
            
            <!-- descriptif de l'annonce -->
            <div class="card-body">
                
                <!-- role -->
                <span class="badge bg-primary mb-1 letter-space"><?= htmlspecialchars($annonce->libelle_role) ?></span>
                <!-- titre de l'annonce -->
                <h5 class="card-title"><?= htmlspecialchars($annonce->titre_chambre) ?></h5>
                <p class="card-text"><?= htmlspecialchars($annonce->libelle_ville) ?></p>
                <!-- <p class="card-text">Chambre: 1</p> -->
                <p class="card-text"><?= htmlspecialchars($annonce->date_disponibilite) ?></p>
                <p class="card-text"><span class="fw-bold h4"><?= htmlspecialchars($annonce->loyer) ?> €</span> par mois</p>
                
           
            </div>
        </div>
    </a>
</div>
<?php endforeach; ?>
<?php endif; ?>

<!-- fin d'une carte -->