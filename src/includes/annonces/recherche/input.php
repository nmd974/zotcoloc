<!-- barre de recherche -->
<div class="input-border bg-light mb-3 input-filter">
    <form method="POST" class="form-group" id="searchAll">
        <div class="input-group">
            <input type="text" name="search_room" class="form-control location-border2" placeholder="Lieux"
            aria-label="location" aria-describedby="button-addon1" id="search" list="datalistOptions" autocomplete="off"
            <?php if(isset($_POST['search_room'])):?>
                value="<?= strip_tags($_POST['search_room'], ENT_QUOTES)?>"
            <?php endif;?>
            >
            <datalist id="datalistOptions"> 
                <?php if(!$liste_villes):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($liste_villes as $liste_ville):?>
                        <option value="<?= ucwords($liste_ville->libelle_ville)?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </datalist>
            <div class="result" id="result-search"></div>
                
            <button class="btn btn-outline-secondary w-25 bg-green text-white btn-radius ms-1" type="submit" id="button-addon2" name="btn-search">Recherche</button>
        </div>
    </form>
</div>