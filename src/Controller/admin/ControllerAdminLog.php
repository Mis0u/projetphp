<?php

namespace Src\Controller\admin;
use Lib\ControllerTwig;
use Src\Model\Admin;

class ControllerAdminLog extends ControllerTwig
{
    public function getAdminLog()
    {
        $errors = [];
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            $admin = new Admin();
            $userName = $post["username"];
            $user = $admin->user($userName);
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
            elseif ($post["username"] != $data["username"]){
                $errors["username"] = "Cet utlisateur est inconnu";
            }
            elseif (!$this->formValidator->isNotEmpty($post["password"])){
                $errors["password"] = "Ce champ ne peut pas être vide";
            }
            elseif(!password_verify($post["password"],$data["userpass"])){
                $errors["password"] = "Ce mot de passe n'est pas valide";
            }
        }
        $this->render('admin/viewAdminLog.html.twig',["errors" => $errors]);
    }

}