
<!-- Sidebar -->
<div class="border-right shadow" id="sidebar-wrapper">
    <div class="list-group list-group-flush" id="sidebar_content">
        <div class="d-flex flex-column justify-content-center align-items-center" id="photo_profil_pc">
                <?php if(empty($ma_photo)):?>
                    <div class="photo_profil" style="background-image: url(../img_default/no-picture-particulier.png);"></div>
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
            <p class="nav_title_profil">@Admin</p>
        </div>
        <a role="button" class="list-group-item list-group-item-action sidebar_item" id="tables_tab">
            <i class="fa fa-database icone_sidebar" aria-hidden="true"></i>
            Gérer les tables
        </a>
        <a role="button" class="list-group-item list-group-item-action sidebar_item" id="utilisateurs_tab">
            <i class="fa fa-users icone_sidebar" aria-hidden="true"></i>
            Gérer les utilisateurs
        </a>
        <a role="button" class="list-group-item list-group-item-action sidebar_item" id="annonces_tab">
            <i class="fa fa-file icone_sidebar" aria-hidden="true"></i>
            Gérer les annonces
        </a>
        <a role="button" class="list-group-item list-group-item-action sidebar_item" id="logs_tab">
            <i class="fa fa-server icone_sidebar" aria-hidden="true"></i>
            Voir les logs internes
        </a>
        
        <div class="footer_sidebar text-center">
            <p>&copy; 2021 <span class="text-green">ZotColoc.</span> All Rights Reserved.</p>
        </div>
    </div>
</div>
<!-- /#sidebar-wrapper -->
