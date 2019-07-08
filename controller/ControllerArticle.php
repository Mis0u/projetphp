<?php

namespace Control;

class ControllerArticle{

    public function article($id_article){
        require "model/ArticleModel.php";
        require "model/CommModel.php";
        $articleModel = new ArticleModel();
        $commModel = new CommModel();
        $article = $articleModel->getArticle($id_article);
        $comments = $commModel->getComm($id_article);
        require "view/viewArticle";
    }
}