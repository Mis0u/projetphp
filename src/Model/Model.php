<?php

namespace Src\Model;

abstract class Model
{

  private $bdd;

    protected function executeRequest($data, $param = null)
    {
        if ($param == null){
            $result = $this->getBdd()->query($data);
        }else{
            $result= $this->getBdd()->prepare($data);
            $result->execute($param);
        }
        return $result;
    }

    private function getBdd()
    {
        if ($this->bdd == null) {
            $this->bdd= new \PDO("mysql:host=localhost;dbname=blog_jf;charset=utf8",'root',"", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));            }
            return $this->bdd;
    }
    
}