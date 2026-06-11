<?php
namespace App\Controllers\IngredientsController;

use \PDO;
use \App\Models\IngredientsModel;
use \App\Models\RecipesModel;

function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/ingredientsModel.php';

    $ingredient = IngredientsModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $ingredient ? $ingredient['name'] : 'Ingrédient';
    ob_start();
    include '../app/views/ingredients/show.php';
    $content = ob_get_clean();
}

function recipesAction(PDO $connexion, int $id)
{
    include_once '../app/models/ingredientsModel.php';
    include_once '../app/models/recipesModel.php';

    $ingredient = IngredientsModel\findOneById($connexion, $id);
    $recipes = \App\Models\RecipesModel\findRecipesByIngredientId($connexion, $id);

    global $title, $content;
    $title = $ingredient ? 'Recettes avec ' . $ingredient['name'] : 'Résultats';
    ob_start();
    include '../app/views/ingredients/recipes.php';
    $content = ob_get_clean();
}
