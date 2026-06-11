<?php
/** @var array $ingredient */
/** @var array $recipes */
?>

<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
  <h1 class="text-3xl font-bold mb-2">Recettes avec « <?php echo htmlspecialchars($ingredient['name'] ?? 'cet ingrédient'); ?> »</h1>
  <p class="text-gray-600 mb-6">Découvrez toutes les recettes qui utilisent cet ingrédient.</p>

  <?php if (!empty($recipes)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($recipes as $recipe): ?>
        <article class="bg-white rounded-lg overflow-hidden shadow-lg">
          <img
            src="<?php echo ($recipe['recipePicture'] ?? ''); ?>"
            alt="<?php echo ($recipe['recipeName'] ?? 'Recette'); ?>"
            class="w-full h-48 object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2"><?php echo ($recipe['recipeName'] ?? 'Recette'); ?></h2>
            <p class="text-gray-600 mb-3"><?php echo (
              
              strlen($recipe['description'] ?? '') > 90
                ? substr($recipe['description'], 0, 87) . '...'
                : $recipe['description'] ?? ''
            ); ?></p>
            <div class="flex items-center justify-between text-sm text-gray-500">
              <span><i class="fas fa-clock"></i> <?php echo ($recipe['prep_time'] ?? ''); ?></span>
              <span>Par <?php echo ($recipe['userName'] ?? 'un membre'); ?></span>
            </div>
            <a
              href="?recipes=show&id=<?php echo (int)($recipe['recipeID'] ?? 0); ?>"
              class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
            >
              Voir la recette
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p class="text-gray-600">Aucune recette ne contient actuellement cet ingrédient.</p>
  <?php endif; ?>
</section>
