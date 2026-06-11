<?php
/** @var array $users */
?>

<section class="mb-8">
  <h1 class="text-3xl font-bold mb-2">Nos chefs</h1>
  <p class="text-gray-600 mb-6">Découvrez les membres de la communauté et leurs profils.</p>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($users as $user): ?>
      <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img
          src="pictures/<?php echo $user['picture']; ?>"
          alt="<?php echo ($user['name']); ?>"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <h2 class="text-xl font-bold mb-2"><?php echo ($user['name']); ?></h2>
          <p class="text-gray-600 text-sm mb-4">
            <?php echo ($user['biography'] ?? 'Aucun résumé disponible.'); ?>
          </p>
          <a
            href="?users=show&id=<?php echo (int) $user['id']; ?>"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white text-sm"
          >Voir le profil</a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
