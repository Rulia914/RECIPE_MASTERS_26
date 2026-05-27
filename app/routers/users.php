<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

//ROUTE DU DETAIL DU USER
//PATTERN : /?users=show&id=x
//CTRL : userController
//ACTION : showAction

switch($_GET['users']):

    case 'show' : UsersController\showAction($connexion, $_GET['id']);
        break;
    case 'index' : UsersController\indexAction($connexion);
    default : ;

endswitch;


//ROUTE POUR TOUS LES USERS
//PATTERN : /?users=index
//CTRL : usersController
//ACTION : indexAction