<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\Admin;
use Lib\AddImage;

class ControllerCreate extends ControllerTwig{
    
    private $errors = [];

    public function create(){
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["title"])&& $this->formValidator->isNotEmpty($post["content"]) && $this->formValidator->isNotEmpty($_FILES["image_article"])){
                $admin = new Admin();
                $addImg = new AddImage();
                $insertImg = $addImg->addImageArticle("image_article");
                $create = $admin->create($post["title"],$post["content"],"asset/upload/" . basename($_FILES["image_article"]['name']));
                header("Location: /admin/auth");
            }
            if (!$this->formValidator->isNotEmpty($post["title"])){
                $this->errors["title"] = "Veuillez écrire votre titre";
            }
            if (!$this->formValidator->isNotEmpty($post["content"])){
                $this->errors["content"] = "Veuillez écrire votre article";
            }
            if (!$this->formValidator->isNotEmpty($_FILES["image_article"])){
                $this->errors["image_article"] = "Veuillez insérer une image";
            }
        }
       
        $newArticle = $this->render('viewAdminCreate.html.twig',["errors" => $this->errors]);
    }
}

