<?php
namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;

function showAction(PDO $connexion, int $id){
    include_once '../app/models/usersModel.php';
    $user = \UsersModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $user['name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}

function indexAction(PDO $connexion){
    include_once '../app/models/usersModel.php';
    $users = \UsersModel\findAll($connexion);

    global $title, $content;
    $title = 'Index des users';
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}