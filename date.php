<?php require("_header.php"); ?>
<?php
  require_once('model/Album.php');
  $ref = new Album();
  
  $current_page = 1;
  if(array_key_exists('page', $_GET)){
    $current_page = intval($_GET['page']);  
  }
  $from = '2010-01-01';
  if(array_key_exists('from_date', $_GET)){
    $from = $_GET['from_date'];
  }
  $to   = '2011-02-01';
  if(array_key_exists('to_date', $_GET)){
    $to = $_GET['to_date'];
  }
  
  $page_nb = $ref->get_pages_nb($from, $to);

  
  ?>
  <div class="row">
                <!--left-->
                <div class="col-md-2" id="leftCol">
                    <div class="row">
                      <form class="" method="get" action="date.php">
                        <div class="form-group">
                          <span class="glyphicon glyphicon-calendar"></span>
                          <label for="fromDate">De la date</label>
                          <input type="date" class="form-control" name="from_date" id="fromDate" value="<?=$from?>">
                        </div>
                        <div class="form-group">
                          <span class="glyphicon glyphicon-calendar"></span>
                          <label for="toDate">à la date</label>
                          <input type="date" class="form-control" name="to_date" id="toDate" value="<?=$to?>">
                        </div>
                        <input type="hidden" name="page" value="<?=$current_page?>"/>
                        <button type="submit" class="btn btn-default">Filtrer</button>
                      </form>
                    </div>
                </div><!--/left-->
                <div class="col-md-1" id="midCol"></div>
                <!--middle-->
                <div class="col-md-9">
                  <div class="row">
                  <nav class="">
                    <ul class="pagination pagination-sm">
                      <li>
                        <a href="date.php?page=<?=max(1, $current_page-1)?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <?php 
                      for ($i = 1; $i <= $page_nb; $i++) {
                          $li_class = "";
                          if($i == $current_page) $li_class = "active";
                          echo '<li class="'.$li_class.'"><a href="date.php?page='.$i.'&from_date='.$from.'&to_date='.$to.'">'.$i.'</a></li>';
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
                  
                  echo '<table class="table table-bordered table-striped table-condensed">';
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
                </div><!--/right-->
            </div><!--/row-->
<?php require("_footer.php"); ?>