<?php
/* require "modele/ArticleModele.php";
$articleModel = new ArticleModele();
$articles = $articleModel->getLastArticle();
require "vue/vueAccueil.php"; 
require "controlleur/ControlleurBlog.php";
$controlleurBlog = new ControlleurBlog();
$articl = $controlleurBlog->blog();*/

require "controller/Router.php";

$router = new Router();
$router->routerRequest();