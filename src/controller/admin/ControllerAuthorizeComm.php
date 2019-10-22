<?php

namespace Src\Controller\admin;
use Src\Model\CommentsModel;

class ControllerAuthorizeComm{

    public function authorizeComm($idComm){
        $comments = new CommentsModel;
        $authorize = $comments->authorizeComment($idComm);
        header("Location: /admin/auth");
    }
}