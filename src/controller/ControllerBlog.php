<?php

namespace Src\Controller;

use Lib\ControllerTwig;
use Src\Model\ArticleModel;



class ControllerBlog extends ControllerTwig
{

    public function blog()
    {
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticles();
        $blog = $this->render('viewBlog.html.twig',["allArticles" => $articles]);
    }
}