<?php
namespace App\Models\RecipesModel;
use \PDO;
// pourquoi un query et pas un prepare ?
// parce que la requete ne contient pas de parametres inconnus, elle est fixe, et ne depend pas de l'utilisateur, donc pas de risque d'injection SQL

function findOneByRand(PDO $connexion): array
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}
//Envoyez à la vue une variable $recipes (avec les 3 dernières) depuisfindAllPopulars()
function FindAllPopulars(PDO $connexion): array
{
    $sql = "SELECT*
            FROM recipes
            ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
function findAllByUserId(PDO $connexion, int $userID)
{
    $sql = "SELECT *
            FROM recipes
            WHERE user_id = :userid
            ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userid', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT *
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