<?php

require 'model/require.php';

/**
 * Insert the last $nb album of the given type
 * type among Ado/Adultes/VO
 */
function insert_last_albums($nb, $type) {
    global $IMG_ROOT; // retrieve IMG_ROOT as global variable
    $album = new Album();
    $albums = $album->get_last_albums($nb, $type);
    echo '<div class="row">';
    // 
    foreach ($albums as $data) {
        echo '<div class="col-md-2">'
        .'<div class="thumbnail">'
        . '<a href="serie.php?idserie=' . $data['idserie'] . '">'
        . '<img src="'.$IMG_ROOT.'/Couvertures/thumbs/m_' . $data['couverture'] . '" alt="' . $data['titre'] . '"></a>'
        .'</div>'
        .'</div>';
    }
    echo '</div>';
}


/**
 * Insert the given request serie
 * $idserie the serie to be inserted
 */
function insert_serie($idserie, $idalbum) {
    global $IMG_ROOT; // retrieve IMG_ROOT as global variable
    $serieO = new Serie();
    $data = $serieO->get_serie($idserie);
    echo '<div class="row">';
    
        echo '<div class="col-md-3" id="leftSerie">'
        . '<a href="serie.php?idserie=' . $data['idserie'] . '">';
        if($data['planche'] == ''){
            echo '<img class="img-thumbnail" src="'.$IMG_ROOT.'/Planches/Encours.jpg" alt="Image en cours"/>';
        }else{
            echo '<img class="img-thumbnail" src="'.$IMG_ROOT.'/Planches/thumbs/m_' . $data['planche'] . '" alt="' . $data['titre'] . '">';
        }
        echo  '</a>'
        . '</div>';
        echo '<div class="col-md-9" id="rightSerie">'
        . '<strong class="text-info">'.utf8_encode($data['titre']).'</strong><br/>'
        . '<span class="label label-default">'.utf8_encode($data['style']).'</span><br/>';
        if ($data['encours'] == 0) {
            echo '<span class="label label-info"   ><span class="glyphicon glyphicon-check"></span>  Série terminée</span><br/>';
        } else if ($data['encours'] == 1){
            echo '<span class="label label-warning"><span class="glyphicon glyphicon-edit" ></span>  Série en cours</span><br/>';
        }else if ($data['encours'] == 2){
            echo '<span class="label label-info"   ><span class="glyphicon glyphicon-check"></span>  ONE-SHOT</span><br/>';
        }
        echo '<small>'.utf8_encode($data['commentaire']).'</small>';
        echo '</div>';
    
    
    echo '</div>';
}
 
function oldinsert_serie($idserie, $idalbum) {
    // on crée la requête SQL pour récupérer la série
    //idserie	titre	style	commentaire	planche	internet	encours
    $sql = "SELECT s.idserie, s.titre, s.style, s.commentaire, s.planche, s.internet, s.encours"
           ." FROM series s "
           ." WHERE s.idserie = $idserie "
           . " LIMIT 1";
    // 
    $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
    echo '<div class="row">';
    $numResults = mysql_num_rows($req);
    // 
    if ($numResults >= 1) {
        $data = mysql_fetch_assoc($req);
        echo '<div class="col-md-3" id="leftSerie">'
        . '<a href="serie.php?idserie=' . $data['idserie'] . '">';
        if($data['planche'] == ''){
            echo '<img class="img-thumbnail" src="'.$IMG_ROOT.'/Planches/Encours.jpg" alt="Image en cours"/>';
        }else{
            echo '<img class="img-thumbnail" src="'.$IMG_ROOT.'/Planches/thumbs/m_' . $data['planche'] . '" alt="' . $data['titre'] . '">';
        }
        echo  '</a>'
        . '</div>';
        echo '<div class="col-md-9" id="rightSerie">'
        . '<strong class="text-info">'.$data['titre'].'</strong><br/>'
        . '<span class="label label-default">'.$data['style'].'</span><br/>';
        if ($data['encours'] == 0) {
            echo '<span class="label label-info"   ><span class="glyphicon glyphicon-check"></span>  Série terminée</span><br/>';
        } else if ($data['encours'] == 1){
            echo '<span class="label label-warning"><span class="glyphicon glyphicon-edit" ></span>  Série en cours</span><br/>';
        }else if ($data['encours'] == 2){
            echo '<span class="label label-info"   ><span class="glyphicon glyphicon-check"></span>  ONE-SHOT</span><br/>';
        }
        echo '<small>'.utf8_encode($data['commentaire']).'</small>';
        echo '</div>';
    }else{
        die('Erreur, too many series returned!<br>' . $sql . '<br>');
    }
    echo '</div>';
    // on ferme la connexion à mysql 

}
?>
