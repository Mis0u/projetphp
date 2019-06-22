<?php


class ControllerHomepage{

    public function homepage(){
        require "model/ArticleModel.php";
        $articleModel = new ArticleModel();
        $articles=$articleModel->getLastArticle();
        require "view/viewHomepage.php";
    }
}