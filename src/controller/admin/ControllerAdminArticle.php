<?php 

namespace Src\Controller\Admin;

use Lib\ControllerTwig;
use Src\Model\ArticleModel;

class ControllerAdminArticle extends ControllerTwig{

  public function getComments($idArticle){
    $article = new ArticleModel();
    $displayArticle = $article->getArticle($idArticle);
    $getArticle = $this->render('admin/viewAdminArticle.html.twig', ["article" => $displayArticle]);  
  }
        
  
}