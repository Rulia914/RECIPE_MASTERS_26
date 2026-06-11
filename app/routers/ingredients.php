<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients'] ?? ''):
    case 'show':
        IngredientsController\showAction($connexion, (int)($_GET['id'] ?? 0));
        break;
    case 'recipes':
        IngredientsController\recipesAction($connexion, (int)($_GET['id'] ?? 0));
        break;
    default:
        break;
endswitch;
