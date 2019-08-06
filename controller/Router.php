<?php

namespace Control;

class Router {
    private $ctrlHome;
    private $ctrlBlog;
    private $ctrlAbout;
    private $ctrlContact;
    private $ctrlArticle;
    private $routes = ["accueil","about","blog","contact"];
    private $url ;

    public function __construct(){
        $this->ctrlHome = new ControllerHomepage();
        $this->ctrlBlog = new ControllerBlog();
        $this->ctrlAbout = new ControllerAbout();
        $this->ctrlContact = new ControllerContact();
        $this->ctrlArticle = new ControllerArticle();
        
        if(isset($_GET["url"])){
           $this->url = explode("/",$_GET["url"]);
           //var_dump($this->url);die;
        }
        
    }

    /* public function routerRequest(){

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
    } */

    /* public function routerGet(){
        $url = "";
        if(htmlspecialchars(isset($_GET["url"]))){
            $url = explode("/",$_GET["url"]);
        }
        if (($url[0] == "") || ( $url[0] == "accueil")){
            $this->ctrlHome->homepage();
        }
        elseif ($url[0] == "blog"){
            $this->ctrlBlog->blog();
        }elseif(($url[0] == "blog" && !empty($url[1]))){
            
            if (($url[1] == "article") && (isset($url[2]))){
                        $idArticle = intval( $url[2]);
                        if ( $idArticle != 0){
                       
                        $this->ctrlArticle->getComments($idArticle);
                        
                        }
                    
                 }     
            
        }
        elseif ($url[0] == "about"){
            $this->ctrlAbout->about();
        }elseif ($url[0] == "contact"){
            $this->ctrlContact->contact();
        }
        
    } */

  

    public function getHomepage(){
        if (htmlspecialchars($this->url[0]) === $this->routes[0]){
            $this->ctrlHome->homepage();

        }
    }

    public function getError(){
        if (htmlspecialchars($this->url[0]) != $this->routes){
            echo "La page " .$this->url[0]. " n'existe pas";
        }
    }

    public function getAbout(){
        if (htmlspecialchars($this->url[0]) === $this->routes[1]){
            $this->ctrlAbout->about();
        }
    }

    public function getBlog(){
        if (htmlspecialchars($this->url[0]) === $this->routes[2]){
            $this->ctrlBlog->blog();
        }
    }

    public function getContact(){
        if (htmlspecialchars($this->url[0]) === $this->routes[3]){
            $this->ctrlContact->contact();
        }
    }

    
}
