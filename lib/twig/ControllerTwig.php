<?php

namespace Lib\twig;
use \Twig_Loader_Filesystem;
use \Twig_Environment;




class ControllerTwig
{

    private $loader;
    private $twig;

    public function __construct()
    {
        $this->loader = new Twig_Loader_Filesystem(__DIR__ ,'/lib/twig');
        $this->twig = new Twig_Environment($this->loader, [//'/path/to/compilation_cache', 
            ]);
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