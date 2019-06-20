<?php require "Controlleur.php";


class ControlleurArticle extends Controlleur{

    public function Article(){
        $articles=$this->executeControlleur(getArticles());
        require "vue/vueArticle.php";
    }
}