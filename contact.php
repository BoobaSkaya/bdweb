<?php require("_header.php"); ?>
<?php require_once("_tools.php"); ?>
<div class="well">
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading">Sandra G</h4>
        <address>
          <strong>Mediathèque Masta</strong><br>
           <a href="mailto:sandra.giacomin@ceastriumtoulouse.fr"><span class="glyphicon glyphicon-envelope"></span>  sandra.giacomin@ceastriumtoulouse.fr</a><br>
          <p>Déésse supérieure, voies impénétrables de la sélection d'oeuvres.</p>
        </address>
      </div>
      <div class="media-right">
        <a href="#">
          <img class="media-object" src="images/badge_sandra.png" alt="Badge Sandra">
        </a>
      </div>
    </div>
</div>
<div class="well">
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading">Yvan LB</h4>
        <address>
          <strong>BD Masta</strong><br>
          <span class="glyphicon glyphicon-envelope"></span>  notknown@unknown.com<br>
          <p>Idée du site, gestion contenu BDs, idées loufoques.</p>
        </address>
      </div>
      <div class="media-right">
        <a href="#">
          <img class="media-object" src="images/badge_yvan.png" alt="Badge Yvan">
        </a>
      </div>
    </div>
</div>
<div class="well">
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading">Nicolas R</h4>
        <address>
          <strong>WebMastah</strong><br>
          <a href="mailto:nicolas.rouviere@gmail.com"><span class="glyphicon glyphicon-envelope"></span>  nicolas.rouviere@gmail.com</a><br>
          <p>Réalisation du site, php, mysql, conseil informatique en tout genre.</p>
        </address>
      </div>
      <div class="media-left">
        <a href="#">
          <img class="media-object media-right" src="<?=  get_gravatar_url('booba.skaya@gmail.com') ?>" alt="Gravatar icon">
        </a>
      </div>
    </div>
</div>

<?php require("_footer.php"); ?>