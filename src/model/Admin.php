<?php

namespace Src\Model;
use Src\Model\Model;

class Admin extends Model
{

    public function user($user)
    {
            $sql="SELECT * FROM admin WHERE username = ?";
            $user= $this->executeRequest($sql, array($user));
           return $user;
    }

    public function delete($idArticle)
    {
        $sql = "DELETE FROM article WHERE id_article = ?";
        $deleteArticle= $this->executeRequest($sql, array($idArticle));
        return $deleteArticle;
    }
    
    public function updateTitle($idArticle, $title)
    {
        $sql = "UPDATE article SET title = ? WHERE id_article = ?";
        $updateTitle= $this->executeRequest($sql, array($title,$idArticle));
        return $updateTitle;
    }

    public function updateContent($idArticle,$content)
    {
        $sql = "UPDATE article SET content = ? WHERE id_article = ?";
        $updateContent= $this->executeRequest($sql, array($content,$idArticle));
        return $updateContent;
    }

    public function updateImg($idArticle,$img)
    {
        $sql = "UPDATE article SET image_article = ? WHERE id_article = ?";
        $updateImg= $this->executeRequest($sql, array($img,$idArticle));
        return $updateImg;
    }

    public function create($title,$content,$img)
    {
        $sql = "INSERT INTO article (title,content,image_article) VALUES(?,?,?)";
        $createArticle= $this->executeRequest($sql, array($title,$content,$img));
        return $createArticle;
    }

}