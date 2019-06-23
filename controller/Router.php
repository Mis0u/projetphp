<?php
require 'ControllerHomepage.php';
require 'ControllerBlog.php';
require 'ControllerAbout.php';
require 'ControllerContact.php';

class Router {
    private $ctrlHome;
    private $ctrlBlog;
    private $ctrlAbout;
    private $ctrlContact;

    public function __construct(){
        $this->ctrlHome = new ControllerHomepage();
        $this->ctrlBlog = new ControllerBlog();
        $this->ctrlAbout = new ControllerAbout();
        $this->ctrlcontact = new ControllerContact();
    }

    public function routerRequest(){

        if ($_SERVER['REQUEST_URI'] === "/projetphp/index.php"){
                $this->ctrlHome->homepage();
            }elseif ($_SERVER['REQUEST_URI'] === "/projetphp/index.php/blog"){
                $this->ctrlBlog->blog();
            }elseif ($_SERVER['REQUEST_URI'] === "/projetphp/index.php/about"){
                $this->ctrlAbout->about();
            }elseif ($_SERVER['REQUEST_URI'] === "/projetphp/index.php/contact"){
                $this->ctrlcontact->contact();
            }
           
         else $this->ctrlHome->homepage();
    }
}
