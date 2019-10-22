<?php

namespace Src\Controller\admin;
use Lib\ControllerTwig;
use Src\Model\Admin;

class ControllerAdminLog extends ControllerTwig{

    public function getAdminLog(){
        $errors = [];
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            $admin = new Admin();
            $user = $admin->user();
            $data = $user->fetch();
            if ($this->formValidator->isNotEmpty($post) 
                && $this->formValidator->isNotEmpty($post["username"])
                && $post["username"] === $data["username"]
                && $this->formValidator->isNotEmpty($post["password"])
                && password_verify($post["password"],$data["userpass"])){
                    $_SESSION['access'] = "confirmed";
                    $_SESSION['username'] = $data["username"];
                    header("Location:/admin/auth");
            }
            if (!$this->formValidator->isNotEmpty($post["username"])){
                $errors["username"] = "Ce champ ne peut pas être vide";
            }
            if (!$this->formValidator->isNotEmpty($post["password"])){
                $errors["password"] = "Ce champ ne peut pas être vide";
            }
            if(!password_verify($post["password"],$data["userpass"])){
                $errors["password"] = "Ce mot de passe n'est pas valide";
            }
        }
        $this->render('admin/viewAdminLog.html.twig',["errors" => $errors]);
    }

}