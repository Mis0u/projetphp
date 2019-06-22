<?php require "Model.php";?>

<?php class ArticleModel extends Model{

    public function getArticles(){
        $sql="SELECT id,content, DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%imin%ss') as date_article,title FROM article";
        $articles= $this->executeRequest($sql);
       return $articles;
    }

    public function getLastArticle(){
        $sql="SELECT id, content,  DATE_FORMAT(date_article, '%d/%m/%Y à %Hh%imin%ss') as date_article,title FROM article ORDER BY date_article DESC LIMIT 1";
        $articles=$this->executeRequest($sql);
        return $articles;
    }
}