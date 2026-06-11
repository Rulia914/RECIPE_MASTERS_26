<?php
namespace App\Controllers\TypesController;

use \PDO;
use \App\Models\TypesModel;
use \App\Models\RecipesModel;

function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/typesModel.php';
    include_once '../app/models/recipesModel.php';

    $type = TypesModel\findOneById($connexion, $id);
    $recipes = RecipesModel\findAllByTypeId($connexion, $id);

    global $title, $content;
    $title = $type ? 'Recettes ' . $type['name'] : 'Type';

    ob_start();
    include '../app/views/types/show.php';
    $content = ob_get_clean();
}
