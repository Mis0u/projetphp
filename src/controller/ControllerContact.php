<?php

namespace Src\Controller;

use Lib\ControllerTwig;
use Lib\FormValidator;


class ControllerContact extends ControllerTwig {

    private $recipient = "blog.jforteroche@gmail.com";
    private $subject = "Message en provenance du blog";

    public function contact()
    {   
        $errors = [];
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if (($this->formValidator->isNotEmpty($post)) && ($this->formValidator->isNotEmpty($post["name"])) && ($this->formValidator->isNotEmpty($post["mail"])) && ($this->formValidator->mail($post["mail"])) && ($this->formValidator->isNotEmpty($post["message"]))){
                $content = 'Nom :'.$post["name"]. '\n';
                $content = 'Email :' .$post["mail"]. '\n';
                $content = 'Message :' .$post["message"]. '\n';
    
                 mail($this->recipient,$this->subject, $content);
            }
            if(!$this->formValidator->isNotEmpty($post["name"])){
                $errors["name"] = "Vous devez indiquer votre nom";
              }
            if(!$this->formValidator->isNotEmpty($post["message"])){
                $errors["message"] = "Vous devez écrire votre message";
              }
            if(!$this->formValidator->isNotEmpty($post["mail"])){
                $errors["mail"] = "Vous devez indiquer votre mail";
              }
            if(!$this->formValidator->mail($post["mail"])){
                $errors["mail"] = "Veuillez indiquer une adresse email valide";
            }
        }
        $this->render('viewContact.html.twig', ["errors" => $errors]);
    }


}