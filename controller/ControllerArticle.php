<?php

class ControllerArticle{

    public function article(){
        require "model/ArticleModel.php";
        require "model/CommeModel.php";
        $articleModel = new ArticleModel();
        $commModel = new CommModel();
        $article = $articleModel->getArticle();
        $comments = $commModel->getComm();
        require "view/viewArticle";
    }
}