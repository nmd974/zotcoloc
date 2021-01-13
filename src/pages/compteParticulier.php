<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<!-- Sidebar -->
<div class="border-right shadow" id="sidebar-wrapper">
    <!-- <div class="sidebar-heading">///</div> -->
    <div class="list-group list-group-flush" id="sidebar_content">
    <div class="d-flex flex-column justify-content-center align-items-center">
            <a href="#">
                <img src="../images/profile.jpg" alt="" class="profile-img">
                <i class="fa fa-camera fa-2x icone_photo" aria-hidden="true"></i>
            </a>
            <p class="nav_title_profil">Mirella</p>
            <p class="arobase_pseudo">@Mirellax</p>
            </div>
        <a href="#" class="list-group-item list-group-item-action sidebar_item">
            <i class="fa fa-cogs icone_sidebar" aria-hidden="true"></i>
            Gérer mon profil
        </a>
        
        <div class="dashboard_items">
            <a href="#" class="list-group-item list-group-item-action sidebar_item">
                <i class="fa fa-tachometer icone_sidebar" aria-hidden="true"></i>
                Mon tableau de bord
            </a>
            <a href="#" class="list-group-item list-group-item-action sidebar_item">
                <i class="fa fa-heart icone_sidebar" aria-hidden="true"></i>
                Mes favoris
                <span class="badge bg-danger">0</span>
            </a>
            
            <a href="#" class="list-group-item list-group-item-action sidebar_item">
                <i class="fa fa-id-badge icone_sidebar" aria-hidden="true"></i>    
                Mes candidatures
                <span class="badge bg-danger">1</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action sidebar_item">
                <i class="fa fa-plus-circle icone_sidebar" aria-hidden="true"></i>
                Mes annonces
                <span class="badge bg-danger">0</span>
            </a>
        </div>
        <div class="contact_zotcoloc">
        <a href="#" class="list-group-item list-group-item-action sidebar_item">
            <i class="fa fa-info-circle icone_sidebar" aria-hidden="true"></i>
            Informations zotcoloc
        </a>
            
        </div>
        
        <div class="footer_sidebar text-center">
            <p>&copy; 2021 <span class="text-green">ZotColoc.</span> All Rights Reserved.</p>
        </div>
    </div>
</div>
<!-- /#sidebar-wrapper -->


<div class="container-fluid" id="wrapper-content">
    <!--TITRE A CHANGER SELON LE INCLUDE AFFICHE-->
    <div class="container">
        <div class="mb-5 subtitle">
            <div class="border-one ps-1">
                <div class="border-two ps-3">
                    <p class="text-secondary m-0 poppins h5">MON PROFIL</p>
                    <h2 class="vidaloka m-0 h1" id="title_step">Gérer mon:<span class="text-green"> profil</span></h2>
                </div>
            </div>
        </div>
    </div>
    <!--METTRE LE CONTENU ICI-->
    <div class="container">
        <?php require_once(dirname(__DIR__).'/includes/compteParticulier/gererProfil.php');?>
    </div>

    <!--BOUTON DE SWITCH SIDEBAR EN MOBILE-->
    <i class="fa fa-user fa-2x" id="menu-toggle" aria-hidden="true"></i>
</div>

<?php //require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<script src="../js/sidebar.js"></script>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>