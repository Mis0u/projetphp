<?php

namespace Src\controller;

use Src\model\ArticleModel;
use Lib\ControllerTwig;

class ControllerHomepage extends ControllerTwig 
{

    public function homepage()
    {
        $articleModel = new ArticleModel();
        $lastArticle= $articleModel->getLastArticle();
        $home = $this->render('viewHomepage.html.twig',$lastArticle);
    }
}