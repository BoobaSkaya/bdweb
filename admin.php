<?php require("_header.php"); ?>
<?php 
  require_once("model/Settings.php");
  require_once("model/require.php")
  global $ADMIN_PASSWORD;
  $settings = new Settings();
  //Handling previous request
  if(!empty($_POST)){
    //get variable to be set
    if($_POST['password'] == $ADMIN_PASSWORD){
      $nb_ado     = intval($_POST['ado_new_nb']);
      $nb_adulte  = intval($_POST['adulte_new_nb']);
      $resAdo = $settings->set_ado_new_nb($nb_ado);
      $resAdu = $settings->set_adulte_new_nb($nb_adulte);
      
      if(!$resAdu){
        echo '<div class="alert alert-danger" role="alert">Impossible de setter: adultes = '.$nb_adulte.'. contact your wonderfull webmaster.</div>';
      }
      if(!$resAdo){
        echo '<div class="alert alert-danger" role="alert">Impossible de setter: ado = '.$nb_ado.'. contact your wonderfull webmaster.</div>';
      }
      if($resAdu && $resAdo){
        echo '<div class="alert alert-success" role="alert">Succès: Ado = '.$nb_ado.' et adultes = '.$nb_adulte.'</div>';
      }
    }else{
      echo '<div class="alert alert-danger" role="alert">Mauvais mot de passe !</div>';
    }
  }
?>

<div class="row">
    <form method="post" action="admin.php">
      <div class="form-group">
        <label for="ado_new_nb">Nombre de nouveautés Ado</label>
        <input type="number" class="form-control" id="ado_new_nb" name="ado_new_nb" value="<?=$settings->get_ado_new_nb() ?>">
      </div>
      <div class="form-group">
        <label for="adulte_new_nb">Nombre de nouveautés Adulte</label>
        <input type="number" class="form-control" id="adulte_new_nb" name="adulte_new_nb" value="<?=$settings->get_adulte_new_nb() ?>">
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
        <input type="hidden" name="test" value="BLABLA"/>
      </div>
      
      <input type="hidden" name="section" value="settings"/>
      <button type="submit" class="btn btn-default">Envoyer</button>
    </form>
    
</div>


<?php require("_footer.php"); ?>