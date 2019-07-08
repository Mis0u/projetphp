<?php 

namespace Model;

class ArticleModel extends Model{

    public function getArticles(){
        $sql="SELECT id_article,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%imin%ss') as date_article,title FROM article";
        $articles= $this->executeRequest($sql);
       return $articles;
    }

    public function getArticle($id_article){
        $sql="SELECT id_article,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%imin%ss') as date_article,title FROM article WHERE id_article = ?";
        $article= $this->executeRequest($sql, array($id_article));
       return $article;
    }

    public function getLastArticle(){
        $sql="SELECT id_article, content,  DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%imin%ss') as date_article,title FROM article ORDER BY date_article DESC LIMIT 1";
        $articles=$this->executeRequest($sql);
        return $articles;
    }
}