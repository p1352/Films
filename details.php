<?php 

include("functions.php");

// Récupère le paramètre passé dans l'adresse URL
$id = $_GET["film"];

// Fonction qui va trouver le bon film
$finder = new Finder($data);
$film = $finder->find($id);

//var_dump($data);

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Films</a></li>
                        <li><a href="#">A propos</a></li>
                        <li><a href="#">Contact</a></li>
                                            </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <h1><?php echo $film->title; ?></h1>
            <div class="pull-left">
                <img src="images/<?php echo $film->image; ?>" class="img-thumbnail" /> 
                            </div>
            <div class="pull-left" style="margin-top: 10px;">
                <dl>
                    <dt>Type</dt>
                    <dd><?php echo $film->type; ?></dd>
                    <dt>Année</dt>
                    <dd><?php echo $film->year; ?></dd>
                    <dt>Pays</dt>
                    <dd><?php echo $film->country; ?></dd>
                    <dt>Réalisateur</dt>
                    <dd><?php echo $film->director; ?></dd>
                    <dt>Durée</dt>
                    <dd><?php echo $film->length; ?></dd>
                    <dt>Résumé</dt>
                    <dd><?php echo $film->abstract; ?></dd>
                                                              
                </dl>
                
            </div>
            <div class="pull-right">
                <a href="/" class="btn btn-success btn-lg active" role="button">Retour à la liste</a>
            </div>
        </div>
             
    </body>
</html>
