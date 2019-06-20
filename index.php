<?php
/* require "modele/ArticleModele.php";
$articleModel = new ArticleModele();
$articles = $articleModel->getLastArticle();
require "vue/vueAccueil.php"; 
require "controlleur/ControlleurBlog.php";
$controlleurBlog = new ControlleurBlog();
$articl = $controlleurBlog->blog();*/

require "controlleur/Routeur.php";

$router = new Routeur();
$router->routerRequest();