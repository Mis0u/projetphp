<?php

require "vendor/autoload.php";

$router = new Control\Router($_GET["url"]);
$ctrlHome = new Control\ControllerHomepage();


$router->getRoutes("accueil", $ctrlHome->homepage());
$router->run();