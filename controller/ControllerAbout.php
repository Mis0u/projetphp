<?php

namespace Control;
use Lib\twig\ControllerTwig;

class ControllerAbout extends ControllerTwig {

  public function about(){
     $about = $this->render('viewAbout.html.twig');
    }

}