<?php

namespace Src\Model;
use Src\Model\Model;

class Admin extends Model{

    public function user(){
            $sql="SELECT * FROM admin";
            $user= $this->executeRequest($sql);
           return $user;
    }

    public function delete($idArticle){
        $sql = "DELETE FROM article WHERE id_article = ?";
        $deleteArticle= $this->executeRequest($sql, array($idArticle));
        return $deleteArticle;
    }

    
}