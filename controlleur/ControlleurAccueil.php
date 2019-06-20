<?php


class ControlleurAccueil{

    public function accueil(){
        require "modele/ArticleModele.php";
        $articleModele = new ArticleModele();
        $articles=$articleModele->getLastArticle();
        require "vue/vueAccueil.php";
    }
}