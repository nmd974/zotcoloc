
<!-- Sidebar -->
<div class="border-right shadow" id="sidebar-wrapper">
    <!-- <div class="sidebar-heading">///</div> -->
    <div class="list-group list-group-flush" id="sidebar_content">
        <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_pc">
            <!-- <form method="post" id="zone_photo_to_edit" class="d-flex flex-column justify-content-center align-items-center">  -->
                <?php if(empty($ma_photo[1])):?>
                    <div class="photo_profil" style="background-image: url(../img_default/no-picture-particulier.png);"></div>
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100 text-white" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        Ajouter une photo
                    </button>
                <?php else:?>
                    <div class="photo_profil" style="background-image: url(../images/<?= $ma_photo[1][0]->libelle_photo ?>);"></div>       
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100 text-white" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        Modifier ma photo
                    </button>
                <?php endif; ?>                
            <!-- <form> -->
            <p class="nav_title_profil"><?= $mon_id_particulier[1][0]->prenom ?></p>
            <p class="arobase_pseudo">@<?= $mon_id_particulier[1][0]->pseudo ?></p>
            </div>
            <a role="button" class="list-group-item list-group-item-action sidebar_item" id="profilNav">
            <i class="fa fa-cogs icone_sidebar" aria-hidden="true"></i>
            Gérer mon profil
            </a>
<!--             
            <a role="button" class="list-group-item list-group-item-action sidebar_item" id="favorisNav">
            <i class="fa fa-heart icone_sidebar" aria-hidden="true"></i>
            Mes favoris
            <span class="badge bg-danger"></span>
            </a> -->
            
            <!-- <a role="button" class="list-group-item list-group-item-action sidebar_item" id="annonceNav">
            <i class="fa fa-plus-circle icone_sidebar" aria-hidden="true"></i>
            Mes annonces
            <span class="badge bg-danger"></span>
            </a> -->
            <div class="contact_zotcoloc">
            <a role="button" class="list-group-item list-group-item-action sidebar_item" data-bs-toggle="modal" data-bs-target="#deleteUser" id="infosNav">
            
            <i class="fa fa-trash icone_sidebar" aria-hidden="true"></i>
            Supprimer mon compte
            
            </a>
            
        </div>            
        
        <div class="footer_sidebar text-center">
            <p>&copy; 2021 <span class="text-green">ZotColoc.</span> All Rights Reserved.</p>
        </div>
    </div>
</div>
<!-- /#sidebar-wrapper -->
