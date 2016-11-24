<?php
include("functions.php");

//Récupérer le type des films
$type = urldecode($_GET["type"]);

//Aller chercher les films correspondants grâce à la fonction finder
$finder = new Finder($data);
$found = $finder->findByType($type);


?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-default" role="navigation">
           <div class="container">
               <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href='/'>Films</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
               </div>
           </div>
        </nav>

        <div class="container">

            <div class="jumbotron">
    <h1><?php echo $title; ?></h1>
    <p> Voici une liste de films que j'ai achetés en Blueray ou DVD mais que je n'ai pas encore eu le temps que visionner.
        Ce site n'est pas encore parfait mais nous verrons dans la fin de semaine comment l'améliorer encore. </p></div>
    <?php if (count($data)>1) : ?>
    <h2><?php printf("J'ai actuellement %s films à regarder :", count($data) - 1); ?></h2>
    <div class="form-group">
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdowntypes" data-toggle="dropdown">
            Types
            <span class="caret"></span>
        </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdowntypes">
        <?php            show_select_types_de_films(); ?>
    </ul>
    </div>
        </div>
    <table class="table table-striped">
        <?php for ($i = 0; $i < count($found); $i++): ?>
               <?php show_row($found[$i]); ?>
                      <?php endfor; ?>
    </table>

    <?php else: ?>
    <h2> Je n'ai pas de film à regarder actuellement. </h2>
    <?php endif; ?>

        </div>
</body> 


</html> 