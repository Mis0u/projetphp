<?php
require "vendor/autoload.php";
//var_dump($_GET["url"]);die;
$router = new Control\Router();


$router->getHomepage();
$router->getError();
$router->getAbout();
$router->getBlog();
$router->getContact();


