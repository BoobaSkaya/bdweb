<?php require("_header.php"); ?>

            <div class="row">
                <!--left-->
                <div class="col-md-3" id="leftCol">
                    <div class="row">
                        <ul class="nav nav-stacked" id="sidebar">
                            <li><a href="#secAdultes">BD Adultes</a></li>
                            <li><a href="#secAdos">BD Ados</a></li>
                            <li><a href="#secVO">BD VO</a></li>
                            <li><a href="#sec1">Section 3</a></li>
                            <li><a href="#sec2">Section 4</a></li>
                        </ul>
                    </div>
                    
                </div><!--/left-->

                <!--middle-->
                <div class="col-md-9">
                    <?php
                    require_once "model/Album.php";
                    $album = new Album();
                    
                    $nb = 24;
                    echo '<h2 id="secAdultes">Les ' . $nb . ' dernières BD Adultes</h2>';
                    insert_last_albums($nb, 'Adultes');
                    
                    echo '<h2 id="secAdos">Les ' . $nb . ' dernières BD Ados</h2>';
                    insert_last_albums($nb, 'Ado');

                    echo '<h2 id="secVO">Les ' . $nb . ' dernières BD VO</h2>';
                    insert_last_albums($nb, 'VO');
                    ?> 
                    
                    <hr>
                </div><!--/right-->
            </div><!--/row-->
<?php require("_footer.php"); ?> 