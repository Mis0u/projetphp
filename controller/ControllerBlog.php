<?php

namespace Control;

use Lib\model\ArticleModel;



class ControllerBlog{

    public function blog(){
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticles();
        require "view/viewBlog.php";
    }
}