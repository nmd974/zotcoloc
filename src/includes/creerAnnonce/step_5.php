<!--STEP 5-->

<?php 
    // session_start();
    // var_dump($_SESSION['liste_interets']);
    // var_dump($_POST);
?>

<div id="bloc_step_5" class="unshow_step">
    
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="submit" class="btn w-25 bg-green text-white mr-5" id="enregistrer_annonce">J'enregistre l'annonce</button>
    </div>

    <!-- CheckBox -->
    <div class="col-md-12">
        <p> 
            <input name="AgreeCheckbox" id="agree" type="checkbox" value="AGREE"> 
            J'accepte que les informations saisies ci-dessus soient correctes. Ce n'est peut-être pas le cas. C'est juste pour s'amuser.
        </p>
    </div>

</div>