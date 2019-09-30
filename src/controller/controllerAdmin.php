<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\ArticleModel;
use Src\Model\Admin;


class ControllerAdmin extends ControllerTwig{

        public function access(){
            $admin = $this->admin();
            $disconnect = $this->disconnect();
        }

        public function pageUpdate(){
            $pageUpdate = $this->render('viewAdminUpdate.html.twig');
        }

        private function admin(){
            if ($_SESSION["access"] != "confirmed" || empty($_SESSION["access"])){
                header("Location: /blog");
            } else{
                $articleModel = new ArticleModel();
                $articles = $articleModel->getArticles();
                $blog = $this->render('viewAdmin.html.twig',["allArticles" => $articles, "sessionUser" => $_SESSION["username"]]);
            }
        }

        private function disconnect(){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post["disconnect"])){
                session_unset();
                session_destroy();
            }
        }

        public function delete($idArticle){
            $post = $this->request->getPost();
            if ($this->formValidator->isNotEmpty($post["delete"])){
                $admin = new Admin();
                $delete = $admin->delete($idArticle);
            }
        }

        

       
}