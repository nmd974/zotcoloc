<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<div class="container">
    <div class="mb-5 subtitle">
        <div class="border-one ps-1">
            <div class="border-two ps-3">
                <p class="text-secondary m-0 poppins h5">INSCRIPTION</p>
                <h2 class="vidaloka m-0 h1" id="title_step">Etape 1/1:<span class="text-green"> Inscription</span></h2>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper_page_content">

    

    <!--On fait afficher la page selon l'id des step de chaque bloc en jqurey-->
    <form method="POST" enctype="multipart/form-data" id="formulaire_inscription">
        <?php require_once(dirname(__DIR__).'/includes/signupFormProprietaire/step_1.php');?>
    </form>

</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>

<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>