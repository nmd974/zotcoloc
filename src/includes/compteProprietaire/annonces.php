<div class="d-flex flex-column justify-content-center align-lg-items-center unshow_step" id="annonceNav_content">


<?php if(count($mes_annonces) == 0):?>
    <img src="../images/no-annonce.png" class="img_moncompte">
    <a href="../pages/creationAnnoncePage.php"><button class="btn btn-success mt-4 w-lg-25 w-md-100">Ajouter une annonce</button></a>
<?php else:?>
<div class="table-responsive">
<?php var_dump($mon_compte);?>

    <table class="table table-striped text-center">
    <thead>
    <tr>
    <th scope="col">Etat</th>
    <th scope="col">Titre</th>
    <th scope="col">Ville</th>
    <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($mes_annonces as $annonce):?>
    <tr>
        <?php if($annonce->statut_chambre == "Active"):?>
            <th class="bg-success text-white align-middle">
                <?php //if($annonce->a_louer == 1){echo "Libre";}else{echo "Occuppé";}?>
            </th>
            <td class="align-middle"><?= ucfirst($annonce->titre_chambre) ?></td>
            <td class="align-middle"><?= ucfirst($annonce->libelle_ville) ?></td>
            <td class="align-middle d-flex justify-content-between flex-column flex-lg-row">
                <a href="../pages/editAnnoncePage.php?id=<?=$annonce->id_chambre?>"><button class="btn btn-success mb-2 mb-lg-0">Voir l'annonce</button></a> 

                <a href="../controllers/annonces/chambres/statut.php?id=<?=$annonce->id_chambre?>&action=0"><button class="btn btn-danger mb-2 mb-lg-0">Désactiver l'annonce</button></a>  
                <a href="../controllers/annonces/chambres/statut.php?id=<?=$annonce->id_chambre?>&action=2"><button class="btn btn-danger mb-2 mb-lg-0">Supprimer l'annonce</button></a> 
            </td>
        <?php else:?>
            <th class="bg-danger text-white align-middle">
                    <?php //if($annonce->a_louer == 1){echo "Libre";}else{echo "Occuppé";}?>
                </th>
        
            <td class="align-middle"><?= ucfirst($annonce->titre_chambre) ?></td>
            <td class="align-middle"><?= ucfirst($annonce->libelle_ville) ?></td>
            <td class="align-middle d-flex justify-content-between flex-column flex-lg-row">
            <a href="../pages/editAnnoncePage.php?id=<?=$annonce->id_chambre?>"><button class="btn btn-success mb-2 mb-lg-0">Voir l'annonce</button></a> 
                <a href="../controllers/annonces/chambres/statut.php?id=<?=$annonce->id_chambre?>&action=1"><button class="btn btn-success mb-2 mb-lg-0">Activer l'annonce</button></a>  
                <a href="../controllers/annonces/chambres/statut.php?id=<?=$annonce->id_chambre?>&action=2"><button class="btn btn-danger mb-2 mb-lg-0">Supprimer l'annonce</button></a> 

            </td>
        <?php endif;?>
    </tr>
<?php endforeach;?>
    </tbody>
    </table>
    </div>
<?php endif;?>
</div>