<?php

namespace Lib;
use Lib\FormValidator;

abstract class ControllerTwig
{

    private $loader;
    private $twig;
    private $truncate;
    protected $request;
    protected $formValidator;

    public function __construct($request)
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/../templates');
        $this->twig = new \Twig\Environment($this->loader);
        $this->request = $request;
        $this->formValidator = new FormValidator();

        $this->truncate = new \Twig\TwigFilter('truncate', function (string $content, int $limit = 300){
            if (strlen($content) <= $limit){
                return $content;
            }
            $lastSpace = strpos($content, ' ', $limit);
             return substr($content, 0 ,$lastSpace). ' ...';
        });

        $this->goToLine =  new \Twig\TwigFilter('goToLine', function (string $sentence, int $limit = 10){
            $lookFor = "-";
            $findIt = strpos($sentence, $lookFor, $limit);
            if ($findIt){
              $test = explode("-",$sentence);
                return $test[0]. "<br>" .$test[1];
            } else{
                return $sentence;
            }
        });


        $this->twig->addFilter($this->truncate);
        $this->twig->addFilter($this->goToLine);

        
      

        
    }
    

    public function render(string $view , array $data = [])
    {
        echo $this->twig->render($view, $data);
    }

}