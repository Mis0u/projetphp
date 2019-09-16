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

  
       /*  if (!empty($_POST)){
            $formValidator = new FormValidator();
            $postMail = htmlspecialchars($_POST["mail"]);
            $postName = htmlspecialchars($_POST["name"]);
            $postMsg = htmlspecialchars($_POST["message"]);
            if ((!empty($postMail)) && ($formValidator->mail($postMail) == true) && (!empty($postName)) && ($formValidator->name($postName) == true) && (!empty($postMsg))){

             $content = 'Nom :'.$postName. '\n';
             $content = 'Email :' .$postMail. '\n';
             $content = 'Message :' .$postMsg. '\n';

             mail($this->recipient,$this->subject, $content);
            } else{
                echo 'Veuillez remplir correctement tout les champs';
            }
        } */
        
    }

}