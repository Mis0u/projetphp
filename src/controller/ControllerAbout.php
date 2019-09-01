<?php

namespace Src\controller;

use Lib\ControllerTwig;

class ControllerAbout extends ControllerTwig {

  public function about(){
     $about = $this->render('viewAbout.html.twig');
    }

}