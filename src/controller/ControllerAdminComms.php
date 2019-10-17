<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\CommentsModel;

class ControllerAdminComms extends ControllerTwig{

    public function displayComms($idArticle){
        $comms = new CommentsModel();
        $displayComms = $comms->getAllComments($idArticle);
        $viewComms= $this->render("admin/viewAdminComments.html.twig",["comments" => $displayComms]);
    }

    public function deleteComm($idComm){
        $comms = new CommentsModel();
        $deleteComm = $comms->deleteComm($idComm);
        header("Location: /admin/auth");
    }
}