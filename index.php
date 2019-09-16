<?php

require "vendor/autoload.php";

use Lib\Http\Request;


$request = new Request($_GET, $_POST, $_SERVER);
$router = new Lib\router\Router($request);

$router->getRoutes("/", "ControllerHomepage+homepage");
$router->getRoutes("blog", "ControllerBlog+blog");
$router->getRoutes("blog/chapitre/:id", "ControllerArticle+getcomments");
$router->getRoutes("about", "ControllerAbout+about");
$router->getRoutes("contact", "ControllerContact+contact");
$router->getRoutes("admin", "ControllerAdminLog+getAdminLog");
$router->run();

