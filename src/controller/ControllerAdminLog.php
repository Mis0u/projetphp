<?php

namespace Src\Controller;
use Lib\ControllerTwig;

class ControllerAdminLog extends ControllerTwig{

    public function getAdminLog(){
        $render = $this->render('viewAdminLog.html.twig');
    }
}