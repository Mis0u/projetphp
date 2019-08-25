<?php

namespace Control;
use Lib\twig\ControllerTwig;

class ControllerAbout extends ControllerTwig {

  public function about(){
    $twig = new ControllerTwig();
     $about = $twig->render('viewAbout.html.twig');
    }

}