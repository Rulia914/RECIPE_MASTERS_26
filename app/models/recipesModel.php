<?php
namespace App\Models\RecipesModel;
use \PDO;
// pourquoi un query et pas un prepare ?
// parce que la requete ne contient pas de parametres inconnus, elle est fixe, et ne depend pas de l'utilisateur, donc pas de risque d'injection SQL

function findOneByRand(PDO $connexion): array
{
    $sql = "SELECT r.id AS recipeID,
                   r.name AS recipeName,
                   r.description,
                   r.picture AS recipePicture,
                   r.user_id AS userID,
                   u.name AS userName,
                   r.prep_time
            FROM recipes r
            LEFT JOIN users u ON u.id = r.user_id
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}
//Envoyez à la vue une variable $recipes (avec les 3 dernières) depuisfindAllPopulars()
function FindAllPopulars(PDO $connexion): array
{
    $sql = "SELECT r.id AS recipeID,
                   r.name AS recipeName,
                   r.description,
                   r.picture AS recipePicture,
                   r.user_id AS userID,
                   u.name AS userName
            FROM recipes r
            LEFT JOIN users u ON u.id = r.user_id
            ORDER BY r.created_at DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
function findAllByUserId(PDO $connexion, int $userID)
{
    $sql = "SELECT r.id AS recipeID,
                   r.name AS recipeName,
                   r.description,
                   r.picture AS recipePicture,
                   r.user_id AS userID
            FROM recipes r
            WHERE r.user_id = :userid
            ORDER BY r.created_at DESC
            LIMIT 3;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userid', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT id AS recipeID,
                   name AS recipeName,
                   description,
                   prep_time,
                   picture AS recipePicture,
                   user_id AS userID,
                   user_id
            FROM recipes
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findByUserId(PDO $conn, int $userID)
{
    $sql = "SELECT *
            FROM recipes
            WHERE user_id = :userid
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userid', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAll(PDO $conn)
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY created_at DESC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByTitle(PDO $conn, string $search): array
{
    $sql = "SELECT *
            FROM recipes
            WHERE LOWER(name) LIKE LOWER(:search)
            ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByTypeId(PDO $conn, int $typeId): array
{
    $sql = "SELECT r.id AS recipeID,
                   r.name AS recipeName,
                   r.description,
                   r.picture AS recipePicture,
                   r.prep_time,
                   r.user_id AS userID,
                   u.name AS userName
            FROM recipes r
            LEFT JOIN users u ON u.id = r.user_id
            WHERE r.type_id = :type_id
            ORDER BY r.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':type_id', $typeId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findIngredientsByRecipeId(PDO $conn, int $recipeId): array
{
    $sql = "SELECT i.id,
                   i.name,
                   i.unit,
                   rhi.quantity
            FROM recipes_has_ingredients rhi
            JOIN ingredients i ON i.id = rhi.ingredient_id
            WHERE rhi.recipe_id = :recipe_id
            ORDER BY i.name;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':recipe_id', $recipeId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findRecipesByIngredientId(PDO $conn, int $ingredientId): array
{
    $sql = "SELECT r.id AS recipeID,
                   r.name AS recipeName,
                   r.description,
                   r.picture AS recipePicture,
                   r.prep_time,
                   r.user_id AS userID,
                   u.name AS userName
            FROM recipes r
            JOIN recipes_has_ingredients rhi ON rhi.recipe_id = r.id
            LEFT JOIN users u ON u.id = r.user_id
            WHERE rhi.ingredient_id = :ingredient_id
            GROUP BY r.id
            ORDER BY r.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':ingredient_id', $ingredientId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}