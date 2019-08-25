<?php

namespace Control;

use Lib\twig\ControllerTwig;
use Lib\model\ArticleModel;



class ControllerBlog extends ControllerTwig
{

    public function blog()
    {
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticles();
        $twig = new ControllerTwig();
        $blog = $twig->render('viewBlog.html.twig',$articles);
    }
}