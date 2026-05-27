<?php
namespace app\Models\CategoriesModel;

use \PDO;

function findAll (PDO $connexion) : array {
    $sql='SELECT * FROM categories ORDER BY id ASC;';

    $rs=$connexion ->query($sql);
    return $rs->fetchALL(PDO::FETCH_ASSOC);
}


?>