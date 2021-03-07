<!-- titre -->
<div class="mb-5 mt-4">
    <div class="border-one ps-1 d-flex justify-content-between">
        <div class="border-two ps-3">
            <p class="text-secondary m-0 poppins h5">DETAILS</p>
            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> de la chambre</span></h2>
        </div>
        <?php if($annonces[1]->id_utilisateur == $_SESSION['id_utilisateur']):?>
        <div class="d-flex mt-4">
            <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#editChambre">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-success" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhotoChambre">
                <i class="fa fa-camera" aria-hidden="true"></i>
            </button>
        </div>
        <?php endif;?>
    </div>
    
</div>

<p class="h3"><?= htmlEntities($annonces[1]->titre_chambre) ?></p>
<div class="d-flex">
    
    <p class="h6 mt-3"> Chambre - <span class="fw-bold"><?= htmlEntities($annonces[1]->surface_chambre) ?>m<sup>2</sup></span></p>
    
</div>
<p class="h6 mt-3"><?= htmlEntities($annonces[1]->description_chambre) ?>
</p>
<!-- avatar -->
<div class="d-flex align-items-center mt-3 mb-4">
    <div class="bg-light shadow" style="width:60px; height: 60px; border-radius: 50%;">
        <?php $utilisateurs = Recherches::photo_utilisateur(htmlEntities($annonces[1]->id_utilisateur))?>
        <?php if(empty($utilisateurs[0])):?>
            <?php if($annonces[1]->libelle_role == "proprietaire"):?>
            <img src="../img_default/no-picture-proprietaire.png" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
            <?php else:?>
            <img src="../img_default/no-picture-particulier.png" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
            <?php endif;?>
        <?php else :?>
            <?php foreach($utilisateurs[1] as $utilisateur):?>
            <img src="../images/<?= htmlEntities($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>
    <div class="ms-3">
        <p class="fw-bold mb-0"><?= ucfirst(htmlEntities($annonces[1]->prenom)) ?></p>
        <p class="mb-0"><?= ucfirst(htmlEntities($annonces[1]->libelle_role)) ?></p>
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
<?php $equipements = Recherches::equipementChambre(htmlEntities($annonces[1]->id_chambre))?>
<?php if(!$equipements[0]):?>
<div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
<?php else :?>
<div class="d-flex flex-wrap">
    <?php foreach($equipements[1] as $equipement):?>
    
    <p class="me-2"><span class="text-green">#</span><?= htmlEntities($equipement->libelle_equipement)?></p>
    
    <?php endforeach; ?>
</div>
<?php endif;?>

