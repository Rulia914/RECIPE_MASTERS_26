<?php
/** @var array $type */
/** @var array $recipes */
?>

<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
  <h1 class="text-3xl font-bold mb-2">Recettes de type : <?php echo htmlspecialchars($type['name'] ?? ''); ?></h1>
  <p class="text-gray-600 mb-6">Voici les recettes correspondant à cette catégorie.</p>

  <?php if (!empty($recipes)): ?>
    <?php foreach ($recipes as $recipe): ?>
      <?php $randomRecipe = $recipe; ?>
      <?php include '../app/views/recipes/_random.php'; ?>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-gray-600">Aucune recette n'est disponible pour ce type.</p>
  <?php endif; ?>
</section>
