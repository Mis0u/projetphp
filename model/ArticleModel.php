<?php 

namespace Model;

class ArticleModel extends Model{

    public function getArticles(){
        $sql="SELECT id_article,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%i') as date_article,title FROM article";
        $articles= $this->executeRequest($sql)->fetchAll();
       return $articles;
    }

    public function getArticle($id_article){
        $sql="SELECT id_article,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%i') as date_article,title FROM article WHERE id_article = ?";
        $article= $this->executeRequest($sql, array($id_article))->fetch();
       return $article;
    }

    public function getLastArticle(){
        $sql="SELECT id_article, content,  DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%i') as date_article,title FROM article ORDER BY date_article DESC LIMIT 1";
        $lastArticle=$this->executeRequest($sql)->fetchAll();
        return $lastArticle;
    }
}