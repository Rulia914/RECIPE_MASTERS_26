<?php
namespace app\Models\IngredientsModel;

use \PDO;

function findAll (PDO $connexion) : array {
    $sql='SELECT * FROM ingredients ORDER BY id ASC;';

    $rs=$connexion ->query($sql);
    return $rs->fetchALL(PDO::FETCH_ASSOC);
}
?>