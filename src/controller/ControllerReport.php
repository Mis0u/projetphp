<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\Admin;
use Src\Model\CommentsModel;

class ControllerReport extends ControllerTwig{

    public function reportComment($idComm){
        $admin = new Admin();
        $reportComm = $admin->reportComment($idComm);
        header("Location: /admin");
    }
}
