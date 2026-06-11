<?php
namespace App\Controllers\RecipesController;

use \PDO;
use \App\Models\RecipesModel;

function indexAction(PDO $connexion, ?string $search = null){
    include_once '../app/models/recipesModel.php';

    $search = trim((string) $search);
    if ($search !== '') {
        $recipes = RecipesModel\findAllByTitle($connexion, $search);
    } else {
        $recipes = RecipesModel\findAll($connexion);
    }

    global $title, $content;
    $title = 'Recettes';
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id){
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($connexion, $id);
    $ingredients = RecipesModel\findIngredientsByRecipeId($connexion, $id);

    global $title, $content;
    $title = $recipe['recipeName'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}