<?php

require "vendor/autoload.php";


$loader = new Twig_Loader_Filesystem(__DIR__ ,'/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false //'/path/to/compilation_cache',
]);

$router = new Lib\Router($_SERVER["PATH_INFO"] ?? "/accueil");

$router->getRoutes("accueil", "ControllerHomepage+homepage");
$router->getRoutes("blog", "ControllerBlog+blog");
$router->getRoutes("blog/chapitre/:id", "ControllerArticle+getcomments");
$router->getRoutes("about", "ControllerAbout+about");
$router->getRoutes("contact", "ControllerContact+contact");
$router->run();

