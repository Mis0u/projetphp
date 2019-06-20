<?php


class ControlleurBlog{

    public function blog(){
        require "modele/ArticleModele.php";
        $articleModele = new ArticleModele();
        $articles=$articleModele->getArticles();
        require "vue/vueBlog.php";
    }
}