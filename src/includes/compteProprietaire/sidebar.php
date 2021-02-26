
<!-- Sidebar -->
<div class="border-right shadow" id="sidebar-wrapper">
    <!-- <div class="sidebar-heading">///</div> -->
    <div class="list-group list-group-flush" id="sidebar_content">
        <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_pc">
            <!-- <form method="post" id="zone_photo_to_edit" class="d-flex flex-column justify-content-center align-items-center">  -->
                <?php if(empty($ma_photo)):?>
                    <div class="photo_profil" style="background-image: url(../images/no-image.png);"></div>
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        <p class="icone_photo text-white">Ajouter une photo</p>
                    </button>
                <?php else:?>
                    <div class="photo_profil" style="background-image: url(../images/<?= $ma_photo[0]->libelle_photo ?>);"></div>       
                    <button class="btn d-flex align-items-center justify-content-center mt-2 w-100" name="save_photo_user" data-bs-toggle="modal" data-bs-target="#editPhoto">
                        <i class="fa fa-camera text-dark me-2" aria-hidden="true"></i>
                        <p class="icone_photo text-white">Modifier ma photo</p>
                    </button>
                <?php endif; ?>                
            <!-- <form> -->
            <p class="nav_title_profil">@<?= $mon_compte[0]->prenom ?> - Propriétaire</p>
        </div>
        <a role="button" class="list-group-item list-group-item-action sidebar_item" id="profilNav">
            <i class="fa fa-cogs icone_sidebar" aria-hidden="true"></i>
            Gérer mon profil
        </a>
        <div class="dashboard_items">
            <a role="button" class="list-group-item list-group-item-action sidebar_item" id="dashboardNav">
                <i class="fa fa-tachometer icone_sidebar" aria-hidden="true"></i>
                Mon tableau de bord
            </a>

            <a role="button" class="list-group-item list-group-item-action sidebar_item" id="annonceNav">
                <i class="fa fa-plus-circle icone_sidebar" aria-hidden="true"></i>
                Mes annonces
                <span class="badge bg-danger"><?= count($mes_annonces)?></span>
            </a>
        </div>
        <div class="contact_zotcoloc">
        <a role="button" class="list-group-item list-group-item-action sidebar_item" data-bs-toggle="modal" data-bs-target="#deleteUserProprietaire" id="infosNav">
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
