<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\Admin;
use Src\Model\ArticleModel;
use Lib\AddImage;

class ControllerUpdate extends ControllerTwig{
    
    public function pageUpdate($id_article){
        $article = new ArticleModel;
        $getArticle = $article->getArticle($id_article);
        $updateArticle = $this->update($id_article);
        $pageUpdate = $this->render('viewAdminUpdate.html.twig',["article"=>$getArticle]);
    }

    private function update($id_article){
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["title"])&& $this->formValidator->isNotEmpty($post["content"])&& $this->formValidator->isNotEmpty($_FILES["image_article"])){
                $admin = new Admin();
                $img = new AddImage();
                $updateImg = $img->addImageArticle("image_article");
                $update = $admin->update($id_article,$post["title"],$post["content"],"asset/upload/" . basename($_FILES["image_article"]['name']));
                header("Location: /admin/auth");
            }
            
        }
    }


}

