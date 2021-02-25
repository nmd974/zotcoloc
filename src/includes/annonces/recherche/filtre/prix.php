<div class="dropdown ms-1 me-1">
    <button class="btn btn-light btn-hidden" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
        Loyer
    </button>
        <div class="dropdown-menu p-4 dropdown-rent">
            <form action="" method="get">
                <p>Budget/mois</p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0"><span id="price-value"></span> €</p>
                        <p>2000+ €</p>
                    </div>
                    <label for="price-range" class="form-label"></label>
                    <input type="range" class="form-range" min="0" max="2000" step="50" value="0" id="price-range">
                    <div class="text-center">
                        <input class="btn btn-success" type="reset" value="Effacer">
                        <input class="btn btn-success" type="submit" value="Appliquer">
                    </div>
            </form>
        </div>
</div>