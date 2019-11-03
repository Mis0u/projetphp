<?php
session_start();

require "vendor/autoload.php";

use Lib\Http\Request;
use Lib\Router\Router;


$request = new Request($_GET, $_POST, $_SERVER);
$router = new Router($request);

$router->getRoutes("/", "ControllerHomepage+homepage");
$router->getRoutes("blog", "ControllerBlog+blog");
$router->getRoutes("blog/chapitre/:id", "ControllerArticle+getcomments");
$router->getRoutes("about", "ControllerAbout+about");
$router->getRoutes("report/:id", "ControllerReport+reportComment");
$router->getRoutes("contact", "ControllerContact+contact");
$router->getRoutes("admin", "admin\\ControllerAdminLog+getAdminLog");
$router->getRoutes("admin/auth", "admin\\ControllerAdmin+access");
$router->getRoutes("admin/disconnect", "admin\\ControllerAdmin+disconnect");
$router->getRoutes("admin/chapitre/:id", "admin\\ControllerAdminArticle+getcomments");
$router->getRoutes("admin/update/:id", "admin\\ControllerUpdate+pageUpdate");
$router->getRoutes("admin/delete/:id", "admin\\ControllerAdmin+delete");
$router->getRoutes("admin/comments/:id", "admin\\ControllerAdminComms+displayComms");
$router->getRoutes("admin/delete/comm/:id", "admin\\ControllerAdminComms+deleteComm");
$router->getRoutes("admin/delete/alertcomm/:id", "admin\\ControllerAdminComms+deleteAlertComm");
$router->getRoutes("admin/authorize/comm/:id", "admin\\ControllerAuthorizeComm+authorizeComm");
$router->getRoutes("admin/create", "admin\\ControllerCreate+create");
$router->run();

