<?php

namespace Src\Controller\admin;
use Lib\ControllerTwig;
use Src\Model\Admin;
use Src\Model\ArticleModel;
use Lib\Upload;

class ControllerUpdate extends ControllerTwig{

    private $errors= [];
    
    public function pageUpdate($id_article){
        $article = new ArticleModel;
        $getArticle = $article->getArticle($id_article);
        $updateArticle = $this->update($id_article);
        $pageUpdate = $this->render('admin/viewAdminUpdate.html.twig',["article" => $getArticle, "errors" => $this->errors]);
    }

    private function update($id_article){
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["title"])){
                $admin = new Admin();
                $updateTitle = $admin->updateTitle($id_article,$post["title"]);
                header("Location: /admin/auth");
            }
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["content"])){
                $admin = new Admin();
                $updateContent = $admin->updateContent($id_article,$post["content"]);
                header("Location: /admin/auth");
            }
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["path_img"])){
                $admin = new Admin();
                $img = new Upload();
                $updateImg = $img->addImage("image_article");
                $update = $admin->updateImg($id_article,"asset/upload/" . basename($_FILES["image_article"]['name']));
                header("Location: /admin/auth");
            }
            if (!$this->formValidator->isNotEmpty($post["path_img"]) && !$this->formValidator->isNotEmpty($post["title"])&& !$this->formValidator->isNotEmpty($post["content"])){
                $this->errors["allEmpty"] = "Vous devez modifier au moins un champ";
            }
            
        }
    }


}

