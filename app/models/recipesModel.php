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
function FindAllByUserId(PDO $connexion, int $userID) 
{
    $sql ="SELECT * FROM recipes WHERE user_id=:userID ORDER BY created_at LIMIT 3;";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs -> execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
//on prepare pcq il y a un paramètre (ID)
 