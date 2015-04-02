<?php require("_header.php"); ?>
<?php
  require_once('model/Album.php');
  $ref = new Album();
  
  if(array_key_exists('page', $_GET)){
    $current_page = intval($_GET['page']);  
  }else{
    $current_page = 1;
  }
  
  $from = '2010-01-01';
  $to   = '2011-02-01';
  $page_nb = $ref->get_pages_nb($from, $to);

  
  ?>
<div class="row">
<nav class>
  <ul class="pagination">
    <li>
      <a href="date.php?page=<?=max(1, $current_page-1)?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php 
    for ($i = 1; $i <= $page_nb; $i++) {
        $li_class = "";
        if($i == $current_page) $li_class = "active";
        echo '<li class="'.$li_class.'"><a href="date.php?page='.$i.'">'.$i.'</a></li>';
    }
    ?>
    <li>
      <a href="date.php?page=<?=min($page_nb, $current_page+1)?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<div class="row">
<?php
$albums    = $ref->get_albums($from, $to, $current_page-1);

echo '<table class="table table-bordered table-striped">';
echo "<tr><th>Date d'achat</th><th>Serie</th><th>Titre</th></tr>";
foreach($albums as $album){
    ?>
    <tr>
      <td><?=$album['dateachat']?></td>
      <td>
          <a href="serie.php?idserie=<?=$album['idserie']?>"><?=utf8_encode($album['serietitre'])?></a> 
          <?php if($album['num']>0){ echo '<span class="badge pull-right">T'.utf8_encode($album['num']).'</span>'; }?>
      </td>
      <td><?=utf8_encode($album['titre'])?></td></tr>
<?php 
    }
echo '</table>';
 
?>
<?php require("_footer.php"); ?>