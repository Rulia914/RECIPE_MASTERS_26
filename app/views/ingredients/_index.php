<!--Liste des ingrédients-->


        <ul class="list-reset text-gray-200">
            <?php 
            include_once '../app/models/ingredientsModel.php';
            $ingredients=\app\Models\ingredientsModel\findAll($connexion);
            foreach($ingredients as $ingredient):?>
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-700 px-2 block"
                    href="#"><?php echo $ingredient['name']; ?></a>
            </li>
           
        </ul>

    <?php endforeach; ?>