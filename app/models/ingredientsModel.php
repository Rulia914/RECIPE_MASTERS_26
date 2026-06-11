<?php
namespace App\Models\IngredientsModel;

use \PDO;

function findOneById(PDO $connexion, int $id): array
{
    $sql = "SELECT id, name, unit, created_at
            FROM ingredients
            WHERE id = :id";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC) ?: [];
}
function findAll (PDO $connexion): array {
    $sql ="SELECT * FROM ingredients ORDER BY name ASC;";
    $rs=$connexion ->query($sql);
    return $rs->fetchALL(PDO::FETCH_ASSOC);
}

function findAllWithRecipeCount(PDO $connexion): array
{
    $sql = "SELECT i.id,
                   i.name,
                   COUNT(rhi.recipe_id) AS recipeCount
            FROM ingredients i
            LEFT JOIN recipes_has_ingredients rhi ON rhi.ingredient_id = i.id
            GROUP BY i.id, i.name
            ORDER BY i.name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}