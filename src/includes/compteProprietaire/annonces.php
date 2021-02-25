<div class="d-flex flex-column justify-content-center align-items-center unshow_step" id="annonceNav_content">


<?php if(count($mes_annonces) == 0):?>
    <img src="../images/no-annonce.png" class="img_moncompte">
    <a href="../pages/creationAnnoncePage.php"><button class="btn btn-success mt-4 w-lg-25 w-md-100">Ajouter une annonce</button></a>
<?php else:?>

    <table class="table table-striped table-responsive text-center">
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
        <?php if($annonce->statut == "Publiee"):?>
            <th class="bg-success text-white align-middle">
                <?php if($annonce->a_louer == 1){echo "Libre";}else{echo "Occuppé";}?>
            </th>
            <td class="align-middle"><?= ucfirst($annonce->titre_chambre) ?></td>
            <td class="align-middle"><?= ucfirst($annonce->libelle_ville) ?></td>
            <td class="align-middle">
                <a href="../pages/editAnnoncePage.php?id=<?=$annonce->id_chambre?>"><button class="btn btn-success">Voir l'annonce</button></a> 
            </td>
        <?php else:?>
            <th class="bg-danger text-white align-middle">
                    <?php if($annonce->a_louer == 1){echo "Libre";}else{echo "Occuppé";}?>
                </th>
        
            <td class="align-middle"><?= ucfirst($annonce->titre_chambre) ?></td>
            <td class="align-middle"><?= ucfirst($annonce->libelle_ville) ?></td>
            <td class="align-middle">
                <a href="../pages/editAnnoncePage.php?id=<?=$annonce->id_chambre?>"><button class="btn btn-success">Voir l'annonce</button></a> 

            </td>
        <?php endif;?>
    </tr>
<?php endforeach;?>
    </tbody>
    </table>
<?php endif;?>
</div>