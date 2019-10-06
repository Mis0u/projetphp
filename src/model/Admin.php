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

    public function deleteComm($idComm){
        $sql = "DELETE FROM commentaires WHERE id_comm = ?";
        $deleteComm= $this->executeRequest($sql, array($idComm));
        return $deleteComm;
    }

    public function update($idArticle, $title,$content,$img){
        $sql = "UPDATE article SET title = ?, content = ?, image_article = ? WHERE id_article = ?";
        $updateArticle= $this->executeRequest($sql, array($title,$content,$img,$idArticle));
        return $updateArticle;
    }

    public function create($title,$content,$img){
        $sql = "INSERT INTO article (title,content,image_article) VALUES(?,?,?)";
        $createArticle= $this->executeRequest($sql, array($title,$content,$img));
        return $createArticle;
    }
}