<?php

namespace Lib;

abstract class ControllerTwig
{

    private $loader;
    private $twig;
    private $function;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/../templates');
        $this->twig = new \Twig\Environment($this->loader);
       
        $this->filter = new \Twig\TwigFilter('truncate', function (string $content, int $limit = 300){
            if (strlen($content) <= $limit){
                return $content;
            }
            $lastSpace = strpos($content, ' ', $limit);
             return substr($content, 0 ,$lastSpace). ' ...';
        });
        $this->twig->addFilter($this->filter);
        
    }
    

    public function render(string $view , array $data = [])
    {
        echo $this->twig->render($view, $data);
    }

}