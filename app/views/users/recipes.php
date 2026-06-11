<?php
/** @var array $user */
/** @var array $recipes */
?>

<section class="mb-8">
  <h1 class="text-3xl font-bold mb-2">Recettes de <?php echo ($user['name']); ?></h1>
  <p class="text-gray-600 mb-6">Liste des recettes publiées par cet auteur.</p>

  <?php if (!empty($recipes)) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($recipes as $recipe) : ?>
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
          <img
            src="<?php echo ($recipe['picture'] ?? ''); ?>"
            alt="<?php echo ($recipe['name'] ?? 'Recette'); ?>"
            class="w-full h-48 object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2"><?php echo ($recipe['name'] ?? 'Recette'); ?></h2>
            <p class="text-gray-600 text-sm mb-4"><?php echo \Core\Helpers\truncate($recipe['description'] ?? '', 80); ?></p>
            <a
              href="?recipes=show&id=<?php echo (int) $recipe['id']; ?>"
              class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white text-sm"
            >Voir la recette</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <p class="text-gray-600">Aucune recette publiée pour cet auteur.</p>
  <?php endif; ?>
</section>
