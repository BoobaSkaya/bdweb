<?php require("_header.php"); ?>

            <div class="row">
                <!--left-->
                <div class="col-md-3" id="leftCol">
                    <div class="row">
                        <ul class="nav nav-stacked" id="sidebar">
                            <li><a href="#secAdultes">BD Adultes</a></li>
                            <li><a href="#secAdos">BD Ados</a></li>
                        </ul>
                    </div>
                    
                </div><!--/left-->

                <!--middle-->
                <div class="col-md-9">
                    <?php
                    require_once "model/Album.php";
                    $album = new Album();
                    require_once "model/Settings.php";
                    $settings = new Settings();
                    
                    $nb = $settings->get_adulte_new_nb();
                    echo '<h2 id="secAdultes">Les ' . $nb . ' dernières BD Adultes</h2>';
                    insert_last_albums($nb, 'Adultes');
                    
                    $nb = $settings->get_ado_new_nb();
                    echo '<h2 id="secAdos">Les ' . $nb . ' dernières BD Ados</h2>';
                    insert_last_albums($nb, 'Ado');

                    ?> 
                    
                    <hr>
                </div><!--/right-->
            </div><!--/row-->
<?php require("_footer.php"); ?> 