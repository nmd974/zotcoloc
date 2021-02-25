 <!-- titre -->
 <?php if(isset($_GET["btn-search"])):?>
                <div class="mb-5">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">RESULTATS</p>
                            <h2 class="vidaloka m-0 h2"><?php echo htmlEntities($nombres[1][0]["COUNT(*)"]);?><span class="text-green"> résultats</span> pour votre recherche
                            </h2>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <?php if(!isset($_GET["btn-search"])):?>
                    <?php $count = Recherches::count_annonce(); ?>
                   
                <div class="mb-5">
                    <div class="border-one ps-1">
                        <div class="border-two ps-3">
                            <p class="text-secondary m-0 poppins h5">ANNONCES</p>
                            <h2 class="vidaloka m-0 h2"><?php echo htmlEntities($count[1][0]["COUNT(*)"]);?><span class="text-green"> annonces</span> actuellement
                            </h2>
                        </div>
                    </div>
                </div>
                <?php endif;?>