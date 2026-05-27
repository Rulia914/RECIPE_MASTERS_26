<!--Affichage d'une card recipe'-->
<?php
/**@var array $recipes */;?>
 
        <?php foreach ($cardRecipes as $recipe): ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Recipe Card -->
                <article
                  class="bg-white rounded-lg overflow-hidden shadow-lg relative"
                >
                  <img
                    src="<?php echo $recipe['picture']; ?>"
                    alt="<?php echo $recipe['name']; ?>"
                    class="w-full h-48 object-cover"
                  />
                  <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $recipe['name']; ?></h3>
                    <div class="flex items-center mb-2">
                      <span class="text-yellow-500 mr-1"
                        ><i class="fas fa-star"></i
                      ></span>
                      <span>4.5</span>
                    </div>
                    <p class="text-gray-600">
                    <?php echo \Core\Helpers\truncate($recipe['description'], 200); ?>
                    </p>
                    <a
                      href="?recipes=show&id=x"
                      class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                      >Voir la recette</a
                    >
                  </div>
                </article>
                <!-- ... (autres cartes de recettes de l'utilisateur) ... -->
              </div>
 
            <?php endforeach?>