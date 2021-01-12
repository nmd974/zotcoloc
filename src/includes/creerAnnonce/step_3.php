<!--STEP 3-->
<div id="bloc_step_3" class="unshow_step">
    <h4 class="mt-3">Dites-nous en plus sur le logement :</h4>

    <!--Meublé ??-->
    <div class="col-md-12">
        <div class="d-flex"> 
            <p>Est-il meublé ?</p>
            <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="meuble" id="meuble" value="true">
                <label class="form-check-label" for="meuble">oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="meuble" id="meuble" value="false">
                <label class="form-check-label" for="meuble">non</label>
            </div>
        </div>  
    </div>

    <!--Eligible ??-->
    <div class="col-md-12">
        <div class="d-flex"> 
            <p>Eligible aides au logements ? ?</p>
            <div class="form-check form-check-inline ms-3">
                <input class="form-check-input" type="radio" name="eligible_aide" id="eligible_aide" value="true">
                <label class="form-check-label" for="eligible_aide">APL/ALS</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="eligible_aide" id="eligible_aide" value="false">
                <label class="form-check-label" for="eligible_aide">non</label>
            </div>
        </div>  
    </div>

    <div>
        <h4>Détails du logement:</h4>
        <div class="col-md-12">
            <p>Règles:</p>
            <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
            </div>

            <p>equipements et services:</p>
            <div class="btn" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck11">Checkbox 1</label>

                <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck12">Checkbox 2</label>

                <input type="checkbox" class="btn-check" id="btncheck13" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck13">Checkbox 3</label>
            </div>

        </div>
    </div>

   
    <!--button validation inscription-->
    <div class="col-12 text-end my-4">
        <button type="button" class="btn w-25 bg-green text-white mr-5" id="step_4">Suivant</button>
    </div>

</div>


