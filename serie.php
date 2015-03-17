<?php require("_header.php"); ?>
            <div class="row">
                <!--left-->
                <div class="col-md-3" id="leftCol">
                    <div class="row">
                        <ul class="nav nav-stacked" id="sidebar">
                            <li><a href="boot.php#secAdultes">BD Adultes</a></li>
                            <li><a href="boot.php##secAdos">BD Ados</a></li>
                            <li><a href="boot.php##secVO">BD VO</a></li>
                            
                        </ul>
                    </div>
                </div><!--/left-->

                <!--middle-->
                <div class="col-md-9">
                    <?php
                    require_once "model/Serie.php";
                    insert_serie($_GET['idserie'], 0000);
                    ?> 
                    <hr>
                </div><!--/right-->
            </div><!--/row-->
<?php require("_footer.php"); ?>