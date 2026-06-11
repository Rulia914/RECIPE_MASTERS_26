<?php
include_once '../app/controllers/usersController.php';

switch ($_GET['users']) {

    // PATTERN: ?users=show&id=X
    // PATTERN: ?users=index
    // PATTERN: ?users=recipes&id=X
    case 'show':
        \App\Controllers\UsersController\showAction($connexion, (int)($_GET['id'] ?? 0));
        break;
    case 'index':
        \App\Controllers\UsersController\indexAction($connexion);
        break;
    case 'recipes':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\UsersController\recipesAction($connexion, (int)($_GET['id'] ?? 0));
        break;
    default:
}