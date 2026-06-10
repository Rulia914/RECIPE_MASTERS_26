<?php
/**@var array $users */;?>
<section class="relative mb-6">
  <?php foreach ($users as $user):?>
              <img
                class="w-full h-96 object-cover"
                src="<?php echo $user['picture'];?>"
                alt="<?php echo $user['name'];?>"
              />
              <div
                class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
              >
                <h1 class="text-3xl font-bold mb-2 text-white">
                <?php echo $user['name'];?>
                </h1>
                <p class="text-gray-300 mb-4">
                <?php echo $user['biography'];?>
                </p>
              </div> 
              <?php endforeach ;?>
            </section>
            <!-- User's Recipes -->
            <section>
              <h2 class="text-2xl font-bold mb-4">Mes recettes</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Recipe Card -->
                <article
                  class="bg-white rounded-lg overflow-hidden shadow-lg relative"
                >
                  <img
                    src="https://source.unsplash.com/480x360/?recipe"
                    alt="Recipe Image"
                    class="w-full h-48 object-cover"
                  />
                  <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">Nom de la recette</h3>
                    <div class="flex items-center mb-2">
                      <span class="text-yellow-500 mr-1"
                        ><i class="fas fa-star"></i
                      ></span>
                      <span>4.5</span>
                    </div>
                    <p class="text-gray-600">
                      Description courte de la recette...
                    </p>
                    <a
                      href="recipe.html"
                      class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                      >Voir la recette</a
                    >
                  </div>
                </article>
                <!-- ... (autres cartes de recettes de l'utilisateur) ... -->
              </div>
            </section>