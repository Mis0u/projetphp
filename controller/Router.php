<?php

namespace Control;

class Router {
    private $ctrlHome;
    private $ctrlBlog;
    private $ctrlAbout;
    private $ctrlContact;
    private$ctrlArticle;

    public function __construct(){
        $this->ctrlHome = new ControllerHomepage();
        $this->ctrlBlog = new ControllerBlog();
        $this->ctrlAbout = new ControllerAbout();
        $this->ctrlcontact = new ControllerContact();
        $this->ctrlArticle = new ControllerArticle();
    }

    public function routerRequest(){

        if (htmlspecialchars($_SERVER['REQUEST_URI']) === "/projetphp/index.php/"){
            $this->ctrlHome->homepage();
        } elseif(htmlspecialchars($_SERVER['REQUEST_URI']) === "/projetphp/index.php/article=1"){
            $this->ctrlArticle->article("1");
        }
            elseif (htmlspecialchars($_SERVER['REQUEST_URI']) === "/projetphp/index.php/blog"){
                $this->ctrlBlog->blog();
            }elseif (htmlspecialchars($_SERVER['REQUEST_URI']) === "/projetphp/index.php/about"){
                $this->ctrlAbout->about();
            }elseif (htmlspecialchars($_SERVER['REQUEST_URI']) === "/projetphp/index.php/contact"){
                $this->ctrlcontact->contact();
            }
           
         else $this->ctrlHome->homepage();
    }
    
}
