<?php
require('ControllerHomepage.php');
require('ControllerBlog.php');
require('ControllerAbout.php');

class Router {
    private $ctrlHome;
    private $ctrlBlog;

    public function __construct(){
        $this->ctrlHome = new ControllerHomepage();
        $this->ctrlBlog = new ControllerBlog();
        $this->ctrlAbout = new ControllerAbout();
    }

    public function routerRequest(){

        if ($_SERVER['REQUEST_URI'] === "/projetphp/index.php"){
                $this->ctrlHome->homepage();
            }elseif ($_SERVER['REQUEST_URI'] === "/projetphp/index.php/blog"){
                $this->ctrlBlog->blog();
            }elseif ($_SERVER['REQUEST_URI'] === "/projetphp/index.php/about"){
                $this->ctrlAbout->about();
            }
           
         else $this->ctrlHome->homepage();
    }
}
