
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Catégories</h2>
       
        <ul class="list-reset text-gray-100">
           <?php 
           include_once '../app/models/typesModel.php';
           $types = \App\Models\TypesModel\findAll($connexion);
           foreach($types as $type):?>

            <li>
                <a
                    class="hover:text-white hover:bg-yellow-600 px-2 block"
                    href="?types=show&id=<?php echo (int) $type['id']; ?>"><?php echo $type['name'];?></a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>