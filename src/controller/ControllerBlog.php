<?php

namespace Src\controller;

use Lib\ControllerTwig;
use Src\model\ArticleModel;



class ControllerBlog extends ControllerTwig
{

    public function blog()
    {
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticles();
        $blog = $this->render('viewBlog.html.twig',$articles);
    }
}