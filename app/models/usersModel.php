<?php
namespace app\Models\usersModel;

use \PDO;


function findOneByRand(PDO $connexion) : array{
    $sql ="SELECT * FROM users ORDER BY RAND() LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);

}
function findOneById (PDO $connexion, int $id)
{
    $sql='SELECT * FROM users WHERE id=:id ;';

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs -> execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
function findAll(PDO $connexion){
    $sql='SELECT * FROM users ORDER BY id ASC;';

    $rs=$connexion ->query($sql);
    return $rs->fetchALL(PDO::FETCH_ASSOC);
}