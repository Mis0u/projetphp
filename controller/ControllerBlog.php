<?php

namespace Control;

use Model\ArticleModel;



class ControllerBlog{

    public function blog(){
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticles();
        require "view/viewBlog.php";
    }
}