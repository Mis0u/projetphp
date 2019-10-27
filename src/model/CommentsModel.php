<?php

namespace Src\Model;

class CommentsModel extends Model
{

    public function getComments($idArticle, $firstEntry , $msgByPage)
    {
        $sql = "SELECT id_comm,content, DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%i') as date_comm,author FROM commentaires WHERE id_article = ? ORDER BY id_comm DESC LIMIT $firstEntry,$msgByPage";
        $comments = $this->executeRequest($sql, array($idArticle))->fetchAll();
        return $comments;
    }

    public function getAllComments($idArticle)
    {
        $sql = "SELECT id_comm,content, DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%i') as date_comm,author FROM commentaires WHERE id_article = ? ORDER BY id_comm DESC";
        $comments = $this->executeRequest($sql, array($idArticle))->fetchAll();
        return $comments;
    }

    public function getIdArticleFromCom($idComm)
    {
        $sql = "SELECT id_article FROM commentaires WHERE id_comm = ?";
        $comments = $this->executeRequest($sql, array($idComm))->fetch();
        return $comments;
    }

    public function countComments($idArticle)
    {
        $sql = "SELECT COUNT(*) as nbcomm FROM commentaires WHERE id_article = ?";
        $totalComm = $this->executeRequest($sql, array($idArticle))->fetch();
        return $totalComm['nbcomm'];
    }

    public function postComm($idArticle,$author,$content)
    {
        $sql = "INSERT into commentaires (id_article,author,content) VALUES(?,?,?)";
        $newComm = $this->executeRequest($sql, array($idArticle,$author,$content));
        return $newComm ;
    }

    public function getReportComments()
    {
        $sql = "SELECT com.content AS com_content, art.content AS a_content, report, id_comm, author, title
                FROM commentaires AS com
                INNER JOIN article AS art
                ON com.id_article = art.id_article";
        $getReport = $this->executeRequest($sql)->fetchAll();
        return $getReport;
    }

    
    public function reportComment($idComm)
    {
        $sql = "UPDATE commentaires SET report = report + 1 WHERE id_comm = ?";
        $report = $this->executeRequest($sql,array($idComm));
        return $report;
    }

    public function authorizeComment($idComm)
    {
        $sql = "UPDATE commentaires SET report = 0 WHERE id_comm = ?";
        $report = $this->executeRequest($sql,array($idComm));
        return $report;
    }

    public function sumReport()
    {
        $sql = "SELECT SUM(report) FROM commentaires";
        $calculateSum =$this->executeRequest($sql)->fetch();
        return $calculateSum;
    }

    public function deleteComm($idComm)
    {
        $sql = "DELETE FROM commentaires WHERE id_comm = ?";
        $deleteComm= $this->executeRequest($sql, array($idComm));
        return $deleteComm;
    }

}