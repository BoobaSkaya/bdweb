<?php require("_header.php"); ?>

            <style>
            
            
            </style>

            <div class="row">
                <!--left-->
                <div class="col-md-3" id="leftCol">
                    <ul class="nav nav-stacked toto" id="sidebar">
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
                        global $IMG_ROOT;
                        foreach($albums as $album){
                            ?>
                            <div class="row" id="T<?=$album['num']?>">
                                <div class="col-md-3" id="leftAlbum<?=$album['num']?>">
                                    <img class="img-thumbnail zoomable" src="<?=get_thumbnail("Couvertures", $album['couverture'])?>" alt="La couverture de <?=utf8_encode($album['titre'])?>"/>
                                    <img class="zoomed" src="<?="$IMG_ROOT/Couvertures/".$album['couverture']?>" alt="La couverture de <?=utf8_encode($album['titre'])?>"/>
                                </div>
                                <div class="col-md-9" id="rightAlbum<?=$album['num']?>">
                                    <strong class="text-info">T<?=$album['num']?> <?=utf8_encode($album['titre'])?></strong><br/>
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
                                    ISBN: <i>
                                        <a href="http://www.books-by-isbn.com/cgi-bin/isbn-lookup.pl?isbn=<?=utf8_encode($album['reference'])?>" alt="chercher via ISBN"><?=utf8_encode($album['reference'])?></a></i><br/>
                                    Éditeur: <?=utf8_encode($album['editeur'])?><br/>
                                    <?php if( $album['collection'] != "") { ?>
                                        Collection: <?=utf8_encode($album['collection'])?><br/>
                                    <?php }?>
                                    Pages: <?=utf8_encode($album['nbpages'])?><br/>
                                    <div class="row pull-right">
                                        <small>
                                            <a href="http://www.senscritique.com/recherche?query=<?=utf8_encode($album['titre'])?>" alt="chercher l'oeuvre sur senscritique.">
                                                <span class="glyphicon glyphicon-bookmark"></span>SC
                                            </a>
                                        </small>
                                        I 
                                        <small>
                                            <a href="https://fr.wikipedia.org/w/index.php?search=<?=utf8_encode($album['titre'])?>" alt="chercher l'oeuvre sur wikipedia.">
                                                <img src="https://honready.hon.com/pc/PublishingImages/wikipedia-icon-small.png" alt="wikipedia icon"/>
                                                Wi
                                            </a>
                                        </small>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div><!--/right-->
            </div><!--/row-->
<?php require("_footer.php"); ?>