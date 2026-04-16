<?php


namespace App\Controllers\PagesController;

use \PDO;
use \App\Models\RecipesModel;

function homeAction(PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $randomRecipe = RecipesModel\findOneByRand($connexion);


    global $title, $content;
    $title = "Home";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
