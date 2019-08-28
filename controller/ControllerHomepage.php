<?php

namespace Control;

use Lib\model\ArticleModel;
use Lib\twig\ControllerTwig;

class ControllerHomepage extends ControllerTwig 
{

    public function homepage()
    {
        $articleModel = new ArticleModel();
        $lastArticle= $articleModel->getLastArticle();
        $home = $this->render('viewHomepage.html.twig',$lastArticle);
    }
}