<?php 

namespace Src\Model;

class ArticleModel extends Model{

    public function getArticles(){
        $sql="SELECT id_article,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%i') as date_article,title,image_article FROM article";
        $articles= $this->executeRequest($sql)->fetchAll();
       return $articles;
    }

    public function getArticle($id_article){
        $sql="SELECT id_article,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%i') as date_article,title FROM article WHERE id_article = ?";
        $article= $this->executeRequest($sql, array($id_article))->fetch();
       return $article;
    }

    public function getLastArticle(){
        $sql="SELECT id_article, content,  DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%i') as date_article,title, image_article FROM article ORDER BY id_article DESC LIMIT 3";
        $lastArticle=$this->executeRequest($sql)->fetchAll();
        return $lastArticle;
    }
}