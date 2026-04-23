<?php

namespace App\Controllers\PagesController;

use \PDO;
use \App\Models\RecipesModel;
use \App\Models\UsersModel;

function homeAction(PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/usersModel.php';

    $randomRecipe = RecipesModel\findOneByRand($connexion);
    $popularRecipes = RecipesModel\findAllPopulars($connexion);
    $randomUser = usersModel\findOneByRand($connexion);
    $userLatestRecipes = recipesModel\findAllByUserId($connexion, $randomUser['id']);

    global $title, $content;
    $title = "Home";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}

