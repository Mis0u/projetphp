<?php

namespace Src\Controller;

use Lib\ControllerTwig;


class ControllerContact extends ControllerTwig {

    public function contact()
    {
        $contact = $this->render('viewContact.html.twig');    
    }
}