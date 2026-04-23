<?php
namespace app\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $connexion) : array{
    $sql ="SELECT * FROM recipes ORDER BY RAND() LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);

}
function findAllPopulars (PDO $connexion): array {
    $sql ="SELECT * FROM recipes ORDER BY created_at DESC LIMIT 3;";
    $rs=$connexion ->query($sql);
    return $rs->fetchALL(PDO::FETCH_ASSOC);
}
