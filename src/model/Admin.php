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

    public function update($idArticle, $title,$content){
        $sql = "UPDATE article SET title = ?, content = ? WHERE id_article = ?";
        $updateArticle= $this->executeRequest($sql, array($title,$content,$idArticle));
        return $updateArticle;
    }

    public function create($title,$content){
        $sql = "INSERT INTO article (title,content) VALUES(?,?)";
        $createArticle= $this->executeRequest($sql, array($title,$content));
        return $createArticle;
    }

    
}