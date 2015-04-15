<?php require("_header.php"); ?>
<?php
    //retrieve the value of the search query
    $search_query = '';
    if(array_key_exists('s', $_GET)){
        $search_query = $_GET['s'];
    }
    //retrieve the albums that respond to that query
    require_once('model/Album.php');
    $ref = new Album();
    $albums = $ref->search_albums($search_query);
    if(count($albums) == 0){
        echo '<div class="alert alert-danger" role="alert">Votre recherche sur le terme "'.$search_query.'" n\'a pas retourné d\'albums! Cherchez autre chose.</div>';
    }elseif(count($albums) == 100){
        echo '<div class="alert alert-warning" role="alert">Votre recherche sur le terme "'.$search_query.'" a retourné trop de résultats! Ne sont présentés que les 100 premiers albums.</div>';
    }elseif(count($albums) == 1){
        echo '<div class="alert alert-success" role="alert">Votre recherche sur le terme "'.$search_query.'" a retourné '.count($albums).' seul album!</div>';
    }else{
        echo '<div class="alert alert-success" role="alert">Votre recherche sur le terme "'.$search_query.'" a retourné '.count($albums).' albums!</div>';
    }
    echo '<table class="table table-bordered table-striped table-condensed">';
    echo "<tr><th>Serie</th><th>Titre</th><th>Scénariste</th><th>Dessinateur</th></tr>";
    foreach($albums as $album){
      ?>
      <tr>
        <td>
            <a href="serie.php?idserie=<?=$album['idserie']?>"><?=utf8_encode($album['serietitre'])?></a> 
            <?php if($album['num']>0){ echo '-T'.utf8_encode($album['num']).''; }?>
        </td>
        <td><a href="serie.php?idserie=<?=$album['idserie']?>"><?=utf8_encode($album['titre'])?></a></td>
        <td><?=utf8_encode($album['prenomscen'])?> <?=utf8_encode($album['nomscen'])?></td>
        <td><?=utf8_encode($album['prenomdess'])?> <?=utf8_encode($album['nomdess'])?></td>
      </tr>
    <?php 
      }
    echo '</table>';


    ?>
    
    
    


<?php require("_footer.php"); ?>