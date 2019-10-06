<?php
session_start();

require "vendor/autoload.php";

use Lib\Http\Request;
use Lib\router\Router;


$request = new Request($_GET, $_POST, $_SERVER);
$router = new Router($request);

$router->getRoutes("/", "ControllerHomepage+homepage");
$router->getRoutes("blog", "ControllerBlog+blog");
$router->getRoutes("blog/chapitre/:id", "ControllerArticle+getcomments");
$router->getRoutes("about", "ControllerAbout+about");
$router->getRoutes("contact", "ControllerContact+contact");
$router->getRoutes("admin", "ControllerAdminLog+getAdminLog");
$router->getRoutes("admin/auth", "ControllerAdmin+access");
$router->getRoutes("admin/disconnect", "ControllerAdmin+disconnect");
$router->getRoutes("admin/chapitre/:id", "ControllerArticle+getcomments");
$router->getRoutes("admin/update/:id", "ControllerUpdate+pageUpdate");
$router->getRoutes("admin/delete/:id", "ControllerAdmin+delete");
$router->getRoutes("admin/delete/comm/:id", "ControllerAdmin+deleteComm");
$router->getRoutes("admin/create", "ControllerCreate+create");
$router->run();

