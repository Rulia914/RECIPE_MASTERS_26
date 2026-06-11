<?php
//Si on a un ?recipes=xxx
//On charge le routeur
if(isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

elseif (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

elseif (isset($_GET['ingredients'])) :
    include_once '../app/routers/ingredients.php';

elseif (isset($_GET['types'])) :
    include_once '../app/routers/types.php';

elseif (isset($_GET['home'])) :
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);

//ROUTE PAR DEFAUT
//PATTERN : ?
//CTRL : PagesController
//ACTION : home
//VIEW : pages/home
else:
include_once '../app/controllers/pagesController.php';

\App\Controllers\PagesController\homeAction($connexion);
endif;