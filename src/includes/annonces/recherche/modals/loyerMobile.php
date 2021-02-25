<button class="btn btn-light modal-btn ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Loyer
</button>
<!-- bouton modal plus de filtre  version mobile -->
<button class="btn btn-light  modal-btn ms-1 me-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
    Plus de filtres
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Loyer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <form action="" method="get">
                <p>Budget/mois</p>
                <div class="d-flex justify-content-between">
                    <p class="mb-0"><span id="price-value2"></span> €</p>
                    <p>2000+ €</p>
                </div>
                <label for="price-range2" class="form-label"></label>
                <input type="range" class="form-range" min="0" max="2000" step="50" value="0"
                    id="price-range2">           
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title fw-bold" id="exampleModalLabel2">Plus de filtres</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- disponibilité -->
        <div class="modal-body">
        <form action="" method="get"> 
            <input type="date" name="date" id="" class="form-control mb-4">
            <p class="h5">Durée</p>
            <div class="d-flex justify-content-between">
                <p class="mb-0"><span id="availability-value2"></span> Mois</p>
                <p>24+ Mois€</p>
            </div>
            <label for="availability-range2" class="form-label"></label>
            <input type="range" class="form-range" min="1" max="24" step="1" value="1"
                id="availability-range2">
                <hr>
        <!-- type -->
        <p class="h5 mb-4">Type d'annonceur</p>
        <select class="form-select mb-4" aria-label="Default select">
            <option value="1">Tout</option>
            <option value="2">Propriétaire</option>
            <option value="3">Résidence</option>
            <option value="4">Colocataire</option>
            <option value="4">Agence</option>
            <option value="4">Coliving</option>
        </select>
    
        <hr>
        <!-- equipement -->
        <p class="h5">Equipement</p>

        <div class="d-flex flex-wrap">

        <!-- items -->
        <div class="text-center ms-2 me-2">
        <div>
        <input type="checkbox" class="btn-check" id="btn-check1" autocomplete="off">
        <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check1"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
        </div> 
        <p>salon</p>
        </div>

        <!-- items -->
        <div class="text-center ms-2 me-2">
        <div>
        <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off">
        <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check2"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
        </div> 
        <p>salon</p>
        </div>

        </div>
        
        <hr class="dropdown-divider">
        <p class="h5">Règles</p>

        <div class="d-flex flex-wrap">

        <!-- items -->
        <div class="text-center ms-2 me-2">
        <div>
        <input type="checkbox" class="btn-check" id="btn-check3" autocomplete="off">
        <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check3"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
        </div> 
        <p>salon</p>
        </div>

        <!-- items -->
        <div class="text-center ms-2 me-2">
        <div>
        <input type="checkbox" class="btn-check" id="btn-check4" autocomplete="off">
        <label class="btn btn-outline-success rounded-circle shadow  bouton-check border-light d-flex align-items-center justify-content-center" for="btn-check4"><div><img src="../images/icones/png/9e23c86.png" alt="icon" class="btn-icon"></div></label>
        </div> 
        <p>salon</p>
        </div>

        </div>

        <hr class="dropdown-divider">
        <div class="d-flex justify-content-between">
        <p class="h5">Chambres disponibles</p>
        <input type="number" min="1" max="10" value="1" class="form-control number-room">

    
        </div>

        
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>

    </div>

