<?php

namespace Src\Controller\admin;
use Lib\ControllerTwig;
use Src\Model\Admin;
use Lib\Upload;

class ControllerCreate extends ControllerTwig
{
    private $errors = [];

    public function create()
    {
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post)
                && $this->formValidator->isNotEmpty($post["title"])
                && $this->formValidator->isNotEmpty($post["content"]) 
                && $this->formValidator->isNotEmpty($post["path_img"])){
                    $admin = new Admin();
                    $addImg = new Upload();
                    $insertImg = $addImg->addImage("image_article");
                    $create = $admin->create($post["title"],$post["content"],$insertImg);
                    header("Location: /admin/auth");
            }
            if (!$this->formValidator->isNotEmpty($post["title"])){
                $this->errors["title"] = "Veuillez écrire votre titre";
            }
            if (!$this->formValidator->isNotEmpty($post["content"])){
                $this->errors["content"] = "Veuillez écrire votre article";
            }
            if (!$this->formValidator->isNotEmpty($post["path_img"])){
                $this->errors["image_article"] = "Veuillez insérer une image";
            }
        }
       
        $newArticle = $this->render('admin/viewAdminCreate.html.twig',["errors" => $this->errors]);
    }
}

