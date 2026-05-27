<!--CATEGORIES-->
<div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">

        <h2 class="font-bold text-lg mb-4">Catégories</h2>
        <ul class="list-reset text-gray-100">
            <?php 
            include_once '../app/models/categoriesModel.php';
            $categories=\app\Models\CategoriesModel\findAll($connexion);
            foreach($categories as $category) :?>
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-600 px-2 block"
                    href="#"><?php echo $category['name']?></a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>