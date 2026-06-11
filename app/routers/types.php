<?php

use \App\Controllers\TypesController;

include_once '../app/controllers/typesController.php';

switch ($_GET['types'] ?? ''):
    case 'show':
        TypesController\showAction($connexion, (int)($_GET['id'] ?? 0));
        break;
    default:
        break;
endswitch;
