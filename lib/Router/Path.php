<?php

namespace Lib\Router;

class Path
{
    private $callable;
    private $path;
    private $matches;

    public function __construct($path, $callable)
    {
        $this->path = trim($path,"/");
        $this->callable = $callable;
    }

    public function match($url)
    {
        $url = trim($url, "/");
        $path = preg_replace("#:([\w]+)#","([^/]+)", $this->path);
        $regex = "#^$path$#";

        if (!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call($request)
    {
       if(is_string($this->callable)){
        $params = explode("+", $this->callable);
        
        $controller = "Src\\controller\\".$params[0];
        $controller = new $controller($request);
        return call_user_func_array([$controller, $params[1]], $this->matches);
       } 
    }
}