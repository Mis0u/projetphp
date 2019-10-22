<?php

namespace Src\Controller\admin;
use Lib\ControllerTwig;
use Src\Model\ArticleModel;
use Src\Model\Admin;
use Src\Model\CommentsModel;
use Src\Controller\admin\ControllerDisconnect;


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
                header("Location: /");
            } else{
                $articleModel = new ArticleModel();
                $articles = $articleModel->getArticles();
                $comments = new CommentsModel();
                $getReportComments = $comments->getReportComments();
                $sumReport = $comments->sumReport();
                $blog = $this->render('admin/viewAdmin.html.twig',["allArticles" => $articles, "sessionUser" => $_SESSION["username"], "reportComm" => $getReportComments, "sumReports" => $sumReport]);
            }
        }
       
}