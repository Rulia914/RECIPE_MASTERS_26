<?php
namespace app\Models\usersModel;

use \PDO;


function findOneByRand(PDO $connexion) : array{
    $sql ="SELECT * FROM users ORDER BY RAND() LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);

}