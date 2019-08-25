<?php 

namespace Control;

use Lib\twig\ControllerTwig;
use Lib\model\ArticleModel;
use Lib\model\CommentsModel;

class ControllerArticle extends ControllerTwig{

  const COMMENT_PER_PAGE = 5;

  public function getComments($idArticle){
    $article = new ArticleModel();
    $displayArticle = $article->getArticle($idArticle);
    $comments =  new CommentsModel();  
    $nbPages = ceil($comments->countComments($idArticle)/self::COMMENT_PER_PAGE);    
    $displayComments = $comments->getComments($idArticle, $this->getFirstResult($idArticle, $nbPages), self::COMMENT_PER_PAGE);
    $twig = new ControllerTwig();
    $commentsArticle = $twig->render('viewArticle.html.twig', $displayComments, $nbPages);  
  }

  private function getFirstResult($idArticle, $nbPages){    
    return ($this->currentPage($nbPages) - 1) * self::COMMENT_PER_PAGE ;
  }

  private function currentPage($nbPages){
    if(isset($_GET['page']) AND !empty($_GET['page'])){
      $currentPage = intval($_GET['page']);
      return $currentPage > $nbPages ? $nbPages : $currentPage;
    } 
     
    return 1;
  }
}