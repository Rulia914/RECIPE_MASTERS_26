<?php
namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;
use \App\Models\RecipesModel;


function indexAction(PDO $connexion) {
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($connexion);

    global $title, $content;
    $title = 'Membres';
    ob_start();
    include '../app/views/users/index.php'; 
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id) {
    include_once '../app/models/usersModel.php';
    $user = UsersModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $user ? $user['name'] : 'Profil inconnu';
    ob_start();
    include '../app/views/users/show.php'; 
    $content = ob_get_clean();
}

function recipesAction(PDO $connexion, int $id) {
    include_once '../app/models/usersModel.php';
    include_once '../app/models/recipesModel.php';

    $user = UsersModel\findOneById($connexion, $id);
    $recipes = RecipesModel\findByUserId($connexion, $id);

    global $title, $content;
    $title = $user ? 'Recettes de ' . $user['name'] : 'Recettes utilisateur';
    ob_start();
    include '../app/views/users/recipes.php';
    $content = ob_get_clean();
}