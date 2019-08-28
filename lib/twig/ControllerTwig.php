<?php

namespace Lib\twig;
/* use \Twig_Loader_Filesystem;
use \Twig_Environment;
use \Twig_TwigFunction; */




class ControllerTwig
{

    private $loader;
    private $twig;
    private $function;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/../lib/twig/view');
        $this->twig = new \Twig\Environment($this->loader);
        /* $this->loader = new Twig_Loader_Filesystem(__DIR__ ,'/lib/twig');
        $this->twig = new Twig_Environment($this->loader, [//'/path/to/compilation_cache', 
            ]);
        $this->function = new Twig_TwigFunction('resumeArticle', function (string $content, int $limit = 100)
        {
            if (strlen($content) <= $limit){
                return $content;
            }
             return substr($content, 0 ,$limit);
        });
        $this->twig->addFunction($this->function); */
        
    }
    

    public function render(string $view ,$array = NULL, $array2 = NULL)
    {
        echo $this->twig->render($view, 
            [
            'array' => $array,
            'secondArray' => $array2
            ]);
    }

}