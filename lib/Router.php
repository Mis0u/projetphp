<?php

namespace Lib;

class Router {

    private $url ;
    private $routes = [];

    public function __construct($url){
      
        $this->url = $url;
        
    }

    public function getRoutes($path, $callable){
        $route = new Path($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new \Exception("Pas de routes");
        } 
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route):
            if($route->match($this->url)){
               return $route->call();
            }
        endforeach;    
        throw new \Exception("URL non valide");
    }   

}
