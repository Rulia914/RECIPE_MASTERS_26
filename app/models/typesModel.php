<?php
namespace app\Models\TypesModel;

use \PDO;
function findAll (PDO $connexion): array {
    $sql ="SELECT * FROM types_of_recipes ORDER BY name ASC;";
    $rs=$connexion ->query($sql);
    return $rs->fetchALL(PDO::FETCH_ASSOC);
}