<!-- barre de recherche -->
<div class="input-border bg-light my-5 input-filter">
    <form method="GET" class="form-group" id="searchAll">
        <div class="input-group">
            <input type="text" name="search-room" class="form-control location-border2" placeholder="Lieux"
            aria-label="location" aria-describedby="button-addon1" id="search" list="datalistOptions" autocomplete="off"
            <?php if(isset($_GET['search-room'])):?>
                value="<?= htmlspecialchars($_GET['search-room'], ENT_QUOTES)?>"
            <?php endif;?>
            >
            <datalist id="datalistOptions"> 
                <?php if(!$liste_villes):?>
                    <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                <?php else :?>
                    <?php foreach($liste_villes as $liste_ville):?>
                        <option value="<?=$liste_ville->libelle_ville?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </datalist>
            <div class="result" id="result-search"></div>
                
            <button class="btn btn-outline-secondary w-25 bg-green text-white btn-radius ms-1" type="submit" id="button-addon2" name="btn-search">Recherche</button>
        </div>
    </form>
</div>