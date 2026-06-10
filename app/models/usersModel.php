<?php
namespace App\Models\UsersModel;
use \PDO;


function findOneByRand(PDO $connexion): array
{
    $sql = "SELECT *
            FROM users
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAll(PDO $connexion): array
{
    $sql = "SELECT *
            FROM users;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
function find(PDO $connexion, int $id): array
{
    $sql = "SELECT *
            FROM users
            WHERE id = :id;";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}