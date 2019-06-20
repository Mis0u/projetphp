<?php
require('ControlleurAccueil.php');
require('ControlleurBlog.php');

class Routeur {
    private $ctrlAccueil;
    private $ctrlBlog;

    public function __construct(){
        $this->ctrlAccueil= new ControlleurAccueil();
        $this->ctrlBlog= new ControlleurBlog();
    }

    public function routerRequest(){
        if($_GET["action"] === "accueil"){
                $this->ctrlAccueil->accueil();
            }elseif ($_GET["action"] === "blog"){
                $this->ctrlBlog->blog();
            }
            else $this->ctrlAccueil->accueil();
    }
}
