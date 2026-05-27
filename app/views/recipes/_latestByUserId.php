<?php
/**@var array $userLatestRecipes */;?>
<div>
        <h4
            class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">
            Mes dernières recettes
        </h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($userLatestRecipes as $cardRecipe): ?>
                <!-- Recipe Card (Repeat for each recipe) -->
                <?php include '../app/views/recipes/_index.php';?>
            <?php endforeach; ?>

        </div>
    </div>