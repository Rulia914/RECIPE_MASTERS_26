<?php
//ROUTE PAR DEFAUT
//PATTERN : ?
//CTRL : PagesController
//ACTION : home
//VIEW : pages/home

include_once '../app/controllers/pagesController.php';

\App\Controllers\PagesController\homeAction($connexion);