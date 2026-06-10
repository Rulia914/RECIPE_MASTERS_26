<?php
include_once '../app/controllers/usersController.php';

switch ($_GET['users']) {
    
    // PATTERN: ?users=show&id=X
    // PATTERN: ?users=index 
    case 'show':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        \App\Controllers\UsersController\showAction($connexion, $_GET['id']);
        break;
    case 'index':
        \App\Controllers\UsersController\indexAction($connexion);
        break;
    default:
}