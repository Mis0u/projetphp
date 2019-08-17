<?php

require "vendor/autoload.php";

$router = new Control\Router($_GET["url"]);


$router->getRoutes("accueil", "ControllerHomepage+homepage");
$router->getRoutes("blog", "ControllerBlog+blog");
$router->getRoutes("blog/chapitre/:id", "ControllerArticle+getcomments");
$router->getRoutes("blog/chapitre/:id/page=:currentpage", "ControllerArticle+getcomments");
$router->getRoutes("about", "ControllerAbout+about");
$router->getRoutes("contact", "ControllerContact+contact");
$router->run();

