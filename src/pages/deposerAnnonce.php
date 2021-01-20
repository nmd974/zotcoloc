<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>


<section section style="background: url('https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/hero-bg.jpg') no-repeat; height: 55vh;" class="hero d-flex align-items-center justify-content-center">
        
        <div class="mt-1">
            <div>
                <h1 class="display-3 text-white vidaloka">Zot<span class="text-green">Coloc</span> Réunion</h1>
                <p class="text-white">Publiez votre logement sur la plateforme spécialiste du logement partagé. Recevez et gérez vos candidatures en quelques clics.</p>
            </div>

            <div class="text-center text-white mt-5">
                <h3>Nous avons la solution pour votre logement partagé</h3>
                <p>Pour déposer votre annonce, dîtes-nous qui vous êtes :</p>
            </div>

            <div class="d-flex justify-content-evenly mt-5">
                
                <a href="./authentificationLoueur.php">
                  <button type="button" class="btn btn-success btn-lg rounded-pill">Colocataire</button>
                </a>
                
                <a href="./authentificationLoueur.php">
                  <button type="button" class="btn btn-success btn-lg rounded-pill">Résidence</button>
                </a>
                
                <a href="./authentificationLoueur.php">
                  <button type="button" class="btn btn-success btn-lg rounded-pill">Propriétaire</button>
                </a>

                <a href="./authentificationLoueur.php">
                  <button type="button" class="btn btn-success btn-lg rounded-pill">Agence</button>
                </a>

            </div>
        </div>
        
    </section>

    <section>
        <div class="my-5 container">
            <div class="text-center">
                <h3>Pourquoi nous rejoindre</h3>
                <p>ZotColoc, la plateforme de référence du logement partagé</p>
            </div>
            

            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">

                <div class="col">
                  <div class="card h-100 border border-3">

                    <div class="d-flex justify-content-center">
                    <i class="fa fa-thumbs-up text-dark fa-3x m-3" aria-hidden="true"></i>
                    </div>
                    
                    <div class="card-body">
                      <h5 class="card-title">Simplicité</h5>
                      <p class="card-text">Grâce à notre processus de dépôt d'annonce clair et intuitif, sublimez votre logement en quelques clics, votre annonce est vérifiée sous 48h !</p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card h-100 border border-3">
                    
                    <div class="d-flex justify-content-center">
                        <i class="fa fa-bullhorn text-dark fa-3x m-3" aria-hidden="true"></i>
                    </div>

                    <div class="card-body">
                      <h5 class="card-title">Visibilité</h5>
                      <p class="card-text">Accédez à la plus grande communauté de colocataires et jeunes en recherche active. Recevez vos candidatures par email, téléphone et sur votre espace ZotColoc.</p>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card h-100 border border-3">

                    <div class="d-flex justify-content-center">
                        <i class="fa fa-handshake-o text-dark fa-3x m-3" aria-hidden="true"></i>
                    </div>
                    
                    <div class="card-body">
                      <h5 class="card-title">Expertise</h5>
                      <p class="card-text">Accédez à la plus grande communauté de colocataires et jeunes en recherche active. Recevez vos candidatures par email, téléphone et sur votre espace ZotColoc.</p>
                    </div>
                  </div>
                </div>

              </div>
        </div>
    </section>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<!-- ON MET ICI DES SCRIPTS ASSOCIES A LA PAGE -->
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>