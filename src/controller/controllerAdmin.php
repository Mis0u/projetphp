<?php

namespace Src\Controller;
use Lib\ControllerTwig;
use Src\Model\ArticleModel;
use Src\Model\Admin;
use Src\Controller\ControllerDisconnect;


class ControllerAdmin extends ControllerTwig{

        public function access(){
            $admin = $this->admin();
        }

        public function delete($idArticle){
            $admin = new Admin();
            $delete = $admin->delete($idArticle);
            header("Location: /admin/auth");
        }

        public function deleteComm($idComm){
            $admin = new Admin();
            $deleteComm = $admin->deleteComm($idComm);
            header("Location: /admin/auth");
        }

        public function disconnect(){
            $control = new ControllerDisconnect();
            $disconnect = $control->disconnect(); 
        }

       
        private function admin(){
            if ($_SESSION["access"] != "confirmed"){
                echo "Vous n'avez pas accès à cette page";
            } else{
                $articleModel = new ArticleModel();
                $articles = $articleModel->getArticles();
                $blog = $this->render('viewAdmin.html.twig',["allArticles" => $articles, "sessionUser" => $_SESSION["username"]]);
            }
        }
       
}