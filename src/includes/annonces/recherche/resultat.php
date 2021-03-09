<?php if(!$annonces):?>
<img src="../img_default/no-logement.png" alt="pas de resultats" class="img-fluid">
<?php else :?>
    <?php
    //Gestion de la pagination
    //On récupère d'abord la page où l'on est
    if(isset($_GET['page'])){
        $page_actuelle = intval($_GET['page']);
        $pagination = new Pagination(
            $annonces,
            9, //Ici c'est le nombre d'ateliers par pages
            intval($_GET['page'])
        );
            
        if(intval($_GET['page']) > 1){
            $compteur= ($_GET['page'] * 9) - 8; //On calcule à partir d'où il faut afficher (nb par page - 1)
        }else{
            $compteur=1;
    }
    }
?>
<?php foreach($annonces as $key => $annonce):?>
    <?php if($key + 1 == $compteur):?>
<?php $idChambre = htmlspecialchars($annonce->id_chambre,ENT_QUOTES); ?>
<?php $idUtilisateur = htmlspecialchars($annonce->id_utilisateur);?>

<!--Ici on gère là où on doit prendre les données selon la page actuelle-->
<?php if($compteur > $pagination->intervalleMin() && $compteur <= $pagination->intervalleMax()):?>
    <?php $compteur++;?>
    <?php $pagination->nombreAfficheActuel();?>
<?php include __ROOT__.'/src/controllers/annonces/recherches/getPhotos.php'?>

<div class="m-2 mb-4">
    
    <div class="card card-relative shadow-lg border " style="width: 18rem;">
        <!-- icon coeur en position absolute-->
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" id="chambre_<?= htmlspecialchars($annonce->id_chambre) ?>"
            class="bi bi-heart heart" viewBox="0 0 16 16">
            <path
            d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
        </svg>
    </div>
    <a href="roommateDetails.php?id=<?= htmlspecialchars($annonce->id_chambre) ?>" class="mode-link">
        <!-- avatar en position absolute -->
        <div class="avatar d-flex justify-content-center align-items-center bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
            
            <?php if(!$utilisateurs):?>
            <?php if($annonce->libelle_role == "proprietaire"):?>
            <img src="../img_default/no-picture-particulier.png" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
            <?php else:?>
            <img src="../img_default/no-picture-particulier.png" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
            <?php endif;?>
            <?php else :?>
            <?php foreach($utilisateurs as $utilisateur):?>
            <img src="../images/<?= htmlspecialchars($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <?php if(!$images):?>
        <img src="../img_default/no-photo.png" class="d-block w-100" alt="room" style="height:190px;">
        <?php else :?>
        <?php foreach($images as $image):?>
        <img src="../images/<?= htmlspecialchars($image->libelle_photo) ?>" class="d-block w-100" alt="room" style="height:190px;">
        <?php endforeach; ?>
        <?php endif; ?>
        
        <!-- descriptif de l'annonce -->
        <div class="card-body card-rslt">
            <!-- role -->
            <span class="badge bg-primary mb-1 letter-space"><?= ucfirst(htmlspecialchars($annonce->libelle_role, ENT_QUOTES)) ?></span>
            <!-- titre de l'annonce -->
            <h5 class="card-title"><?= htmlspecialchars(substr($annonce->titre_chambre, 0 , 20), ENT_QUOTES) ?>...</h5>
            <p class="card-text fw-bold"><?= htmlspecialchars($annonce->libelle_ville, ENT_QUOTES) ?></p>
            <p class="card-text">Disponible le : <?= (new DateTime(htmlspecialchars($annonce->date_disponibilite).'00:00:00'))->format('d/m/Y') ?></p>
            <p class="card-text"><span class="fw-bold h4"><?= htmlspecialchars($annonce->loyer) ?> €</span> par mois</p>
        </div>
        
    </div>
</a>
</div>
<?php endif;?>
<?php endif;?>
<?php endforeach; ?>

<?php endif; ?>

<!-- fin d'une carte -->
