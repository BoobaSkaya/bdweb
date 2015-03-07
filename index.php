<?php
require_once "_tools.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <title>Mediathèque BD</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">     
        <style>
            body { padding-top: 50px; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a href="/BD2/Web/boot.php" class="navbar-brand">MEDIATHEQUE BD</a>
                </div>
                <nav class="collapse navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://ce.palays.free.fr/BD/Web/index.php">L'ancien site</a>
                        </li>
                        <li>
                            <a href="http://ce.palays.free.fr/BD/Web/moteur.php?coll=albums">Rechercher</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!--main-->
        <div class="container">
            <div class="row">
                <!--left-->
                <div class="col-md-3" id="leftCol">
                    <div class="row">
                        <ul class="nav nav-stacked" id="sidebar">
                            <li><a href="#secAdultes">BD Adultes</a></li>
                            <li><a href="#secAdos">BD Ados</a></li>
                            <li><a href="#secVO">BD VO</a></li>
                            <li><a href="#sec1">Section 3</a></li>
                            <li><a href="#sec2">Section 4</a></li>
                        </ul>
                    </div>
                    
                </div><!--/left-->

                <!--middle-->
                <div class="col-md-9">
                    <?php
                    $nb = 24;
                    echo '<h2 id="secAdultes">Les ' . $nb . ' dernières BD Adultes</h2>';
                    insert_last_albums($nb, 'Adultes');

                    echo '<h2 id="secAdos">Les ' . $nb . ' dernières BD Ados</h2>';
                    insert_last_albums($nb, 'Ado');

                    echo '<h2 id="secVO">Les ' . $nb . ' dernières BD VO</h2>';
                    insert_last_albums($nb, 'VO');
                    ?> 
                    
                    <hr>
                </div><!--/right-->
            </div><!--/row-->
        </div><!--/container-->



        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>