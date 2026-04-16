<?php
namespace app\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $connexion) : array{
    $sql ="SELECT * FROM recipes ORDER BY RAND() LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);

}
