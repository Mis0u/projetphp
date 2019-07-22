<?php

namespace Control;

class Router {
    private $ctrlHome;
    private $ctrlBlog;
    private $ctrlAbout;
    private $ctrlContact;
    private $ctrlArticle;

    public function __construct(){
        $this->ctrlHome = new ControllerHomepage();
        $this->ctrlBlog = new ControllerBlog();
        $this->ctrlAbout = new ControllerAbout();
        $this->ctrlcontact = new ControllerContact();
        $this->ctrlArticle = new ControllerArticle();
    }

    public function routerRequest(){

        if (htmlspecialchars($_SERVER['REQUEST_URI']) === "/index.php"){
            $this->ctrlHome->homepage();
        }   else if (isset($_GET['article'])){
                    if (isset($_GET['id'])){
                        $idArticle = intval($_GET['id']);
                        if ($idArticle != 0) {
                                $this->ctrlArticle->getComments($idArticle);
                        }
                    }                    
            }
            elseif (htmlspecialchars($_SERVER['REQUEST_URI']) === "/blog"){
                $this->ctrlBlog->blog();
            }elseif (htmlspecialchars($_SERVER['REQUEST_URI']) === "/about"){
                $this->ctrlAbout->about();
            }elseif (htmlspecialchars($_SERVER['REQUEST_URI']) === "/contact"){
                $this->ctrlcontact->contact();
            }
           
         else $this->ctrlHome->homepage();
    }
    
}
