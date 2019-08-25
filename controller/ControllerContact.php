<?php

namespace Control;

use Lib\twig\ControllerTwig;


class ControllerContact extends ControllerTwig {

    public function contact()
    {
        $twig = new ControllerTwig();
        $contact = $twig->render('viewContact.html.twig');    
    }
}