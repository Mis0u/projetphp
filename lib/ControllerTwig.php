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
       
        $this->function = new \Twig\TwigFunction('resumeArticle', function (string $content, int $limit = 300)
        {
            if (strlen($content) <= $limit){
                return $content;
            }
            $lastSpace = strpos($content, ' ', $limit);
             return substr($content, 0 ,$lastSpace). ' ...';
        });
        $this->twig->addFunction($this->function);
        
    }
    

    public function render(string $view ,$array = NULL, $array2 = NULL, $array3 = NULL)
    {
        echo $this->twig->render($view, 
            [
            'array' => $array,
            'secondArray' => $array2,
            'thirdArray' => $array3
            ]);
    }

}