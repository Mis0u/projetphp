<?php

namespace Control;
use Lib\model\ArticleModel;

class ControllerHomepage{

    public function homepage(){
        $articleModel = new ArticleModel();
        $lastArticle=$articleModel->getLastArticle();
        require "view/viewHomepage.php";
    }
}