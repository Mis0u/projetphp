<?php

namespace Lib;
use Lib\FormValidator;

abstract class ControllerTwig
{

    private $loader;
    private $twig;
    private $function;
    protected $request;
    protected $formValidator;

    public function __construct($request)
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/../templates');
        $this->twig = new \Twig\Environment($this->loader);
        $this->request = $request;
        $this->formValidator = new FormValidator;

       
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