<div class="dropdown ms-1 me-1">
    <button class="btn btn-light btn-hidden" type="button" id="dropdownMenu4" data-bs-toggle="dropdown"
        aria-expanded="false">
        Disponibilité
    </button>

    <div class="dropdown-menu p-4 dropdown-availability">
        <form action="" method="get">
            
            <input type="date" name="date" id="" class="form-control mb-4">
            
            <p class="h5">Durée</p>
            <div class="d-flex justify-content-between">
                <p class="mb-0"><span id="availability-value"></span> Mois</p>
                <p>24+ Mois€</p>
            </div>
            <label for="availability-range" class="form-label"></label>
            <input type="range" class="form-range" min="1" max="24" step="1" value="1"
                id="availability-range">
            <div class="text-center">
                <input class="btn btn-success" type="reset" value="Effacer">
                <input class="btn btn-success" type="submit" value="Appliquer">
            </div>
        </form>
    </div>
</div>