<?php


class ControllerBlog{

    public function blog(){
        require "model/ArticleModel.php";
        $articleModel = new ArticleModel();
        $articles=$articleModel->getArticles();
        require "view/viewBlog.php";
    }
}