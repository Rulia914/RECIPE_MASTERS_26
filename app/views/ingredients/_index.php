
<ul class="list-reset text-gray-200">
    <?php
    include_once '../app/models/ingredientsModel.php';
    $ingredients = \App\Models\IngredientsModel\findAllWithRecipeCount($connexion);
    foreach ($ingredients as $ingredient):
    ?>
        <li>
            <a
                class="hover:text-white hover:bg-yellow-700 px-2 block"
                href="?ingredients=recipes&id=<?php echo (int) $ingredient['id']; ?>">
                <?php echo htmlspecialchars($ingredient['name'], ENT_QUOTES, 'UTF-8'); ?>
                <span class="text-yellow-100">(<?php echo (int) $ingredient['recipeCount']; ?>)</span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>