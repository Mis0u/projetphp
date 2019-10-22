<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\CommentsModel;

class ControllerReport extends ControllerTwig{

    public function reportComment($idComm){
        $comment = new CommentsModel();
        $reportComm = $comment->reportComment($idComm);
        $getIdArticle = $comment->getIdArticleFromCom($idComm);
        header("Location: /blog/chapitre/$getIdArticle[0]");
    }
}
