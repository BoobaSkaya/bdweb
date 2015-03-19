<?php require("_header.php"); ?>
            <div class="row">
                <!--left-->
                <div class="col-md-3" id="leftCol">
                    <div class="row">
                        <ul class="nav nav-stacked" id="sidebar">
                        <?php
                        require_once "model/Serie.php";
                        $series = new Serie();
                        $albums = $series->get_albums_of_serie($_GET['idserie']);
                        foreach($albums as $album){
                        ?> 
                            <li><a href="#T<?=$album['num']?>"><?= 'T'.$album['num'].' '.utf8_encode(substr($album['titre'], 0, 30)) ?> </a></li>
                        <?php 
                        }
                        ?>
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
                    <div class="row">
                        <?php
                        foreach($albums as $album){
                            ?>
                            <div class="row" id="T<?=$album['num']?>">
                                <div class="col-md-3" id="leftAlbum<?=$album['num']?>">
                                    <img class="img-thumbnail" src="<?=$IMG_ROOT?>/Couvertures/thumbs/m_<?=$album['couverture']?>" alt="La couverture de <?=utf8_encode($album['titre'])?>"/>
                                </div>
                                <div class="col-md-9" id="rightAlbum<?=$album['num']?>">
                                    <strong class="text-info"><?=utf8_encode($album['titre'])?></strong><br/>
                                    <span class="label label-info"   ><span class="glyphicon glyphicon-modal-window"></span>
                                    <?php
                                        $format = $album['format'];
                                        if ( $format == 0) {       echo 'NORMAL';
                                        } else if ($format == 1){  echo 'GRAND';
                                        } else if ($format == 2){  echo "A l'Italienne";
                                        } else if ($format == 3){  echo 'Autre';
                                        }
                                    ?>
                                    </span><br/>
                                    ISBN: <i><?=utf8_encode($album['reference'])?></i><br/>
                                    Éditeur: <?=utf8_encode($album['editeur'])?><br>
                                    <?php if( $album['collection'] != "") { ?>
                                        Collection: <?=utf8_encode($album['collection'])?>
                                    <?php }?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div><!--/right-->
            </div><!--/row-->
<?php require("_footer.php"); ?>