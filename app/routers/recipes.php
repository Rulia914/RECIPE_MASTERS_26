<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

//ROUTE DU DETAIL DE LA RECETTE
//PATTERN : /?recipes=show&id=x
//CTRL : recipesController
//ACTION : showAction

switch($_GET['recipes']):

    case 'show' : RecipesController\showAction($connexion, $_GET['id']);
        break;

    default : ;

endswitch;


//ROUTE POUR TOUTES LES RECETTES
//PATTERN : /?recipes=index
//CTRL :
//ACTION :