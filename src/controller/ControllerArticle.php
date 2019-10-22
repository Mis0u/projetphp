<?php 

namespace Src\Controller;

use Lib\ControllerTwig;
use Src\Model\ArticleModel;
use Src\Model\CommentsModel;

class ControllerArticle extends ControllerTwig{

  private $errors = [];
  const COMMENT_PER_PAGE = 5;

  public function getComments($idArticle){
    $article = new ArticleModel();
    $displayArticle = $article->getArticle($idArticle);
    $comments =  new CommentsModel();  
    $nbPages = ceil($comments->countComments($idArticle)/self::COMMENT_PER_PAGE);    
    $displayComments = $comments->getComments($idArticle, $this->getFirstResult($idArticle, $nbPages), self::COMMENT_PER_PAGE);
    $displayNewComments = $this->postComm($idArticle);
    $getPage = $this->currentPage($nbPages);
    $commentsArticle = $this->render('viewArticle.html.twig', ["comms" => $displayComments, "nbPages" => $nbPages, "article" => $displayArticle, "errors" => $this->errors, "session" => $_SESSION,"actualPage" =>$getPage]);  
  }

  private function getFirstResult($idArticle, $nbPages){    
    return ($this->currentPage($nbPages) - 1) * self::COMMENT_PER_PAGE ;
  }

  private function currentPage($nbPages){
    $get = $this->request->getGet();
    if(isset($get['page']) AND $this->formValidator->isNotEmpty($get['page'])){
      $currentPage = intval($get['page']);
      return $currentPage > $nbPages ? $nbPages : $currentPage;
    } 
     
    return 1;
  }

  private function postComm($idArticle){
    if ($this->request->getMethod() == "POST"){
      $post = $this->request->getPost();
      if ($this->formValidator->isNotEmpty($post)
        && $this->formValidator->isNotEmpty($post["name"]) 
        && $this->formValidator->isNotEmpty($post["message"]) ){
          $comments = new CommentsModel();
          $comments->postComm($idArticle,$post["name"],$post["message"]);
            header("Location: /blog/chapitre/$idArticle");
      }
      if(!$this->formValidator->isNotEmpty($post["name"])){
        $this->errors["name"] = "Vous devez indiquer votre nom";
      }
      if(!$this->formValidator->isNotEmpty($post["message"])){
        $this->errors["message"] = "Vous devez écrire votre commentaire";
      }
    }
     
    
  }
        
  
}