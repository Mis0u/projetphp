<?php 

namespace Src\Controller;

use Lib\ControllerTwig;
use Src\Model\ArticleModel;
use Src\Model\CommentsModel;
use Lib\FormValidator;

class ControllerArticle extends ControllerTwig{

  const COMMENT_PER_PAGE = 5;

  public function getComments($idArticle){
    $article = new ArticleModel();
    $displayArticle = $article->getArticle($idArticle);
    $comments =  new CommentsModel();  
    $nbPages = ceil($comments->countComments($idArticle)/self::COMMENT_PER_PAGE);    
    $displayComments = $comments->getComments($idArticle, $this->getFirstResult($idArticle, $nbPages), self::COMMENT_PER_PAGE);
    $displayNewComments = $this->postComm($idArticle);
    $commentsArticle = $this->render('viewArticle.html.twig', ["comms" => $displayComments, "nbPages" => $nbPages, "article" => $displayArticle]);  
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

  private function postComm($idArticle){
      $post = $this->request->getPost();
      if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["name"]) && $this->formValidator->isNotEmpty($post["message"]) ){
        $comments = new CommentsModel();
        $comments->postComm($idArticle,$post["name"],$post["message"]);
            header("Location: /blog/chapitre/$idArticle");
      }
        /* if (!empty($_POST)){
          $postComm = new InsertComm();
          $formValidator = new FormValidator();
          $postName = $_POST["name"];
          $postMsg = $_POST["message"];
          if ((!empty($postName)) && ($formValidator->name($postName) == true) && (!empty($postMsg))){
            $comms = $postComm->postComm($idArticle,$postName,$postMsg);
            header("Location: /blog/chapitre/$idArticle");
            
          } else{
              $errors =$_POST["name"] ="Nom mal écris";
          } */
      
    
  }
        
  
}