<?php

namespace Control;
use Model\ArticleModel;

class ControllerHomepage{

    public function homepage(){
        $articleModel = new ArticleModel();
        $article=$articleModel->getLastArticle();
        require "view/viewHomepage.php";
    }
}