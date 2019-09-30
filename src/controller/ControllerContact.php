<?php

namespace Src\Controller;

use Lib\ControllerTwig;
use Lib\FormValidator;


class ControllerContact extends ControllerTwig {




    private $recipient = "blog.jforteroche@gmail.com";
    private $subject = "Message en provenance du blog";

    

    public function contact()
    {   
        $contact = $this->render('viewContact.html.twig');
        $send = $this->send();
    }

    public function send(){
        $post = $this->request->getPost();
        if (($this->formValidator->isNotEmpty($post)) && ($this->formValidator->isNotEmpty($post["name"])) && ($this->formValidator->isNotEmpty($post["mail"])) && ($this->formValidator->mail($post["mail"])) && ($this->formValidator->isNotEmpty($post["message"]))){
            $content = 'Nom :'.$post["name"]. '\n';
            $content = 'Email :' .$post["mail"]. '\n';
            $content = 'Message :' .$post["message"]. '\n';

             mail($this->recipient,$this->subject, $content);
        }
    }

}