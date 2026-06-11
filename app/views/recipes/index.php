<?php
/**@var array $recipes */;?>
<main class="w-full md:w-3/4 p-3">

<!-- User Main Content -->
<!-- Main content -->
<div class=" p-3">
<h2 class="text-3xl py-4">Index des recettes</h2>
  <!-- User's Recipes -->
  <section>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach($recipes as $recipe):?>
      <!-- Recipe Card -->
      <article
        class="bg-white rounded-lg overflow-hidden shadow-lg relative"
      >
        <img
          src="<?php echo $recipe['picture'];?>"
          alt="<?php echo $recipe['name'];?>"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <h3 class="text-xl font-bold mb-2"><?php echo $recipe['name'];?></h3>
          <div class="flex items-center mb-2">
            <span class="text-yellow-500 mr-1"
              ><i class="fas fa-star"></i
            ></span>
            <span>4.5</span>
          </div>
          <p class="text-gray-600">
          <?php \Core\Helpers\truncate($recipe['description'], 50);?>
          </p>
          <a
            href="?recipes=show&id=<?php echo (int) $recipe['id']; ?>"
            class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
            >Voir la recette</a
          >
        </div>
      </article>
      <?php endforeach;?>
      <!-- ... (autres cartes de recettes de l'utilisateur) ... -->
    </div>
  </section>
  
</div>
</div>
</main>