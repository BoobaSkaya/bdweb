<?php require("_header.php"); ?>
<?php
require_once "model/Serie.php";
$series = new Serie();
?>

<style type="text/css">
/* This styles are there to make the left column and right column scrollable independently*/
@media (min-width: 768px){
  #leftCol {
    position: absolute;
    top: 55px;
    bottom: 0px;
    left: 0;
    width: 24%;
    overflow-y: scroll; 
  }
  
  
  #rightCol {
    position: absolute;
    top: 55px;
    bottom: 0px;
    padding-bottom: 300px; 
    padding-right:20px;
    right: 0;
    overflow-y: scroll;
    width: 74%;
  }
}
#leftCol {
  
  height:100%;
}

#rightCol {
  height:100%;
  
}
</style>
<!--left column contains the serie list-->
<?php 
// The list take soooooo space that we have to make it invisible on small devices.
function insert_list(){?>
    <?php
        //extract the filter to process
        $filter = "";
        if(array_key_exists('filter', $_GET)){
            $filter = $_GET['filter'];
        }
        $all_class = "";
        $adultes_class = "";
        $ados_class    = "";
        if($filter == "") {
            $all_class = "active";
        }else if($filter == "Adultes") {
            $adultes_class = "active";
        }else if($filter == "Ado"){
            $ados_class = "active";
        }
    ?>
    <ul class="nav nav-tabs">
      <li role="presentation" class="<?= $all_class     ?>"><a href="serie.php?idserie=<?= $_GET['idserie']?>"               >Tout</a></li>
      <li role="presentation" class="<?= $adultes_class ?>"><a href="serie.php?idserie=<?= $_GET['idserie']?>&filter=Adultes">Adultes</a></li>
      <li role="presentation" class="<?= $ados_class    ?>"><a href="serie.php?idserie=<?= $_GET['idserie']?>&filter=Ado">Ados</a></li>
    </ul>
    <div class="pagination pagination-sm small">
      <a href="#A">A</a>
      <a href="#B">B</a>
      <a href="#C">C</a>
      <a href="#D">D</a>
      <a href="#E">E</a>
      <a href="#F">F</a>
      <a href="#G">G</a>
      <a href="#H">H</a>
      <a href="#I">I</a>
      <a href="#J">J</a>
      <a href="#K">K</a>
      <a href="#L">L</a>
      <a href="#M">M</a>
      <a href="#N">N</a>
      <a href="#O">O</a>
      <a href="#P">P</a>
      <a href="#Q">Q</a>
      <a href="#R">R</a>
      <a href="#S">S</a>
      <a href="#T">T</a>
      <a href="#U">U</a>
      <a href="#V">V</a>
      <a href="#W">W</a>
      <a href="#X">X</a>
      <a href="#Y">Y</a>
      <a href="#Z">Z</a>
    </div>
    <ul class="" id="sidebar" style="list-style: none;">
        <?php
        require_once "model/Serie.php";
        $series = new Serie();
        $all_series = $series->get_all($filter);
        $first_letter_previous = "Z";
         foreach($all_series as $serie){
            //Get first letter of serie
            $first_letter = substr($serie['serietitre'], 0, 1);
            if(ctype_alpha($first_letter) && $first_letter != $first_letter_previous){
                //new letter is coming
                $id = 'id="'.$first_letter.'"';
                $first_letter_previous = $first_letter;
                echo '<h4 id="'.$first_letter.'">'.$first_letter.'<h4>';
            }else{
                $id = '';
            }
                
        ?>
            <li class="small"><a href="serie.php?idserie=<?=$serie['idserie']?>&filter=<?=$filter?>">
                <?= utf8_encode(substr($serie['serietitre'], 0, 30)) ?>
                </a><font color="gray">- [<?=$serie['COUNT(*)']?>]</font></li>
        <?php 
        }
        ?>
    </ul>
<?php
}
?>

<div class="col-md-3 hidden-xs" id="leftCol">
    <?php
        //make list invisible on small devices on left column
        //but set is visible as right column ... see end of file
        insert_list();
    ?>
</div><!--/left-->

<!--middle-->
<div class="col-md-9" id="rightCol">
    <?php
    require_once "model/Serie.php";
    insert_serie($_GET['idserie'], 0000);
    ?> 
    <hr>
    <div class="row">
        <?php
        global $IMG_ROOT;
        $albums = $series->get_albums_of_serie($_GET['idserie']);
        foreach($albums as $album){
            ?>
            
                <?php 
                    if(date('Y', strtotime($album['dateachat'])) == 2999){
                        echo '<div class="row alert alert-danger" id="T'.$album['num'].'">';
                            echo '<div class="row">';
                            echo '<p class="text-center"><small>Bientôt disponible!</small></p>';
                            echo '</div>';
                    }else{
                        echo '<div class="row" id="T'.$album['num'].'">';
                    }
                ?>
                <div class=row>
                    <div class="col-md-3" id="leftAlbum<?=$album['num']?>">
                        <a target="_blank" href="<?="$IMG_ROOT/Couvertures/".$album['couverture']?>" title="Ouvrir en pleine page dans un nouvel onglet">
                            <img class="img-thumbnail zoomable" src="<?=get_thumbnail("Couvertures", $album['couverture'])?>" alt="La couverture de <?=utf8_encode($album['titre'])?>"/>
                            <img class="zoomed" src="<?="$IMG_ROOT/Couvertures/".$album['couverture']?>" alt="La couverture de <?=utf8_encode($album['titre'])?>"/>
                        </a>
                    </div>
                    <!-- Use 8 column span, because the righ slider takes some little space.
                    let it 1 cell wide space available-->
                    <div class="col-md-8" id="rightAlbum<?=$album['num']?>">
                        
                        <strong class="text-info">T<?=$album['num']?> <?=utf8_encode($album['titre'])?>
                       
                        </strong><br/>
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
                        <?php 
                        if(date('Y', strtotime($album['dateachat'])) != 2999){
                           ?>
                            Date d'achat: <?=date('Y', strtotime($album['dateachat']))?><br/>
                            <?php
                        }
                            ?>
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
                </div>
            </div><!--Div closing the album's row div-->
        <?php
        }//foreach album
        ?>
    </div>
</div><!--/right-->

<div class="col-md-3 visible-xs-block" id="othercol">
    <?php
        //The list will be on the right on small devices like smartphones
        insert_list();
    ?>
</div><!--/left-->

<?php require("_footer.php"); ?>