<!-- barre de recherche -->
<div class="input-border bg-light mb-3 input-filter">
                    <form method="get" class="form-group">
                        <div class="input-group">
                            <input type="text" name="search-room" class="form-control location-border2" placeholder="Lieux"
                                aria-label="location" aria-describedby="button-addon1" id="search" list="datalistOptions" autocomplete="off">
                                <datalist id="datalistOptions"> 
                                
                                <?php //$liste_villes = Recherches::listVille()?>
                                <?php if(!$liste_villes[0]):?>
                                <div class="alert alert-danger">Erreur serveur : Impossible de charger le contenu !</div>
                                <?php else :?>
                                    <?php foreach($liste_villes as $liste_ville):?>
                                        <option value="<?=$liste_ville->libelle_ville?>">
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </datalist>
                                
                               
                                <div class="result" id="result-search"></div>
                                
                            <button class="btn btn-outline-secondary w-25 bg-green text-white btn-radius ms-1" type="submit"
                                id="button-addon2" name="btn-search">Recherche</button>
                        </div>
                    </form>
                </div>