<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\Admin;

class ControllerCreate extends ControllerTwig{
    
    public function create(){
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["title"])&& $this->formValidator->isNotEmpty($post["content"])){
                $admin = new Admin();
                $create = $admin->create($post["title"],$post["content"]);
                header("Location: /admin/auth");
            }
        }
        $newArticle = $this->render('viewAdminCreate.html.twig');
    }
}

