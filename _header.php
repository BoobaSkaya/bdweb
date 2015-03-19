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
                    <a href="/index.php" class="navbar-brand">MEDIATHEQUE BD</a>
                </div>
                <nav class="collapse navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="http://ce.palays.free.fr/BD/Web/index.php">L'ancien site</a>
                        </li>
                        <li>
                            <a href="http://ce.palays.free.fr/BD/Web/moteur.php?coll=albums">Rechercher</a>
                        </li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Album/Auteur/Serie">
                            </div>
                            <button type="submit" class="btn btn-default">Chercher</button>
                        </form>
                    </ul>
                </nav>
                
            </div>
        </nav>

        <!--main-->
        <div class="container">