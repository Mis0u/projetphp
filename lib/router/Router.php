<?php

namespace Lib\router;

class Router {

    private $url ;
    private $routes = [];
    private $request;

    public function __construct($request){
      
        $this->request = $request;
        
    }

    public function getRoutes($path, $callable){
        $route = new Path($path, $callable);
        $this->routes[] = $route;
    }

    public function run(){
        foreach($this->routes as $route):
            if($route->match($this->request->getUri())){
               return $route->call($this->request);
            }
        endforeach;    
        throw new \Exception("URL non valide");
    }   

}
