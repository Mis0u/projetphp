<?php

namespace Src\Controller\admin;
use Lib\ControllerTwig;
use Src\Model\CommentsModel;

class ControllerAdminComms extends ControllerTwig{

    public function displayComms($idArticle){
        $comms = new CommentsModel();
        $displayComms = $comms->getAllComments($idArticle);
        $comments = new CommentsModel();
        $countComments = $comments->countComments($idArticle);
        $viewComms= $this->render("admin/viewAdminComments.html.twig",["comments" => $displayComms, "countComms" => $countComments]);
    }

    public function deleteComm($idComm){
        $comms = new CommentsModel();
        $deleteComm = $comms->deleteComm($idComm);
        header("Location: /admin/auth");
    }
}