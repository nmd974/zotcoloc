<!-- titre -->
<div class="mb-5 mt-4">
    <div class="border-one ps-1">
        <div class="border-two ps-3">
            <p class="text-secondary m-0 poppins h5">DETAILS</p>
            <h2 class="vidaloka m-0 h1">Détails<span class="text-green"> de la chambre</span></h2>
        </div>
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
                <?php if(!$utilisateurs[0]):?>
                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($utilisateurs[1] as $utilisateur):?>
                <img src="../images/<?= htmlEntities($utilisateur->libelle_photo) ?>" class="rounded-circle shadow-sm p-1" alt="avatar" style="width:60px; height: 60px; border-radius: 50%;">
                <?php endforeach; ?>
                    <?php endif; ?>
            
</div>
<div class="ms-3">
<p class="fw-bold mb-0"><?= htmlEntities($annonces[1]->prenom) ?></p>
<p class="mb-0"><?= htmlEntities($annonces[1]->libelle_role) ?></p>
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
                <!-- <div class="d-flex">
               
                <div class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                        <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i> 
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <p class="mb-0">Equipement du logement</p>
                        </div>
                    </div>
                </div>
               
                <div class="equipment-room border-secondary border shadow mb-2 d-flex align-items-center justify-content-center m-1">
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                        <i class="fa fa-file-image-o fa-3x text-dark ms-3" aria-hidden="true"></i> 
                        </div>
                        <div class="d-flex align-items-center ms-2">
                            <p class="mb-0">Equipement du logement</p>
                        </div>
                    </div>
                </div>
                </div> -->
