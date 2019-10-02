<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\Admin;
use Src\Model\ArticleModel;

class ControllerUpdate extends ControllerTwig{
    
    public function pageUpdate($id_article){
        $article = new ArticleModel;
        $getArticle = $article->getArticle($id_article);
        $updateArticle = $this->update($id_article);
        $pageUpdate = $this->render('viewAdminUpdate.html.twig',["article"=>$getArticle]);
    }

    public function update($id_article){
        if ($this->request->getMethod() == "POST"){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post)&& $this->formValidator->isNotEmpty($post["title"])&& $this->formValidator->isNotEmpty($post["content"])){
                $admin = new Admin();
                $update = $admin->update($id_article,$post["title"],$post["content"]);
                header("Location: /admin/auth");
            }
        }
    }


}

