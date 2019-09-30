<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\Admin;

class ControllerAdminLog extends ControllerTwig{

    public function getAdminLog(){
        $render = $this->render('viewAdminLog.html.twig');
        $accesAdmin = $this->accesAdmin();
    }

    private function accesAdmin(){
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

                echo"<h1> Les identifiants sont incorrects </h1>";


    }
}