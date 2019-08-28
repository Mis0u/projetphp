<?php

namespace Control;

use Lib\twig\ControllerTwig;


class ControllerContact extends ControllerTwig {

    public function contact()
    {
        $contact = $this->render('viewContact.html.twig');    
    }
}