<?php

namespace Src\Model;

class CommentsModel extends Model{

    public function getComments($id_article, $firstEntry , $msgByPage){
        $sql = "SELECT id_comm,content, DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%i') as date_comm,author FROM commentaires WHERE id_article = ? ORDER BY id_comm DESC LIMIT $firstEntry,$msgByPage";
        $comments = $this->executeRequest($sql, array($id_article))->fetchAll();
        return $comments;
    }

    public function getAllComments($id_article){
        $sql = "SELECT id_comm,content, DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%i') as date_comm,author FROM commentaires WHERE id_article = ? ORDER BY id_comm DESC";
        $comments = $this->executeRequest($sql, array($id_article))->fetchAll();
        return $comments;
    }

    public function countComments($id_article){
        $sql = "SELECT COUNT(*) as nbcomm FROM commentaires WHERE id_article = ?";
        $totalComm = $this->executeRequest($sql, [$id_article])->fetch();
        return $totalComm['nbcomm'];
    }

    public function postComm($id_article,$author,$content){
        $sql = "INSERT into commentaires (id_article,author,content) VALUES(?,?,?)";
        $newComm = $this->executeRequest($sql, array($id_article,$author,$content));
        return $newComm ;
    }

    public function getReportComments(){
        $sql = "SELECT com.content AS com_content, art.content AS a_content, report, id_comm, author, title
                FROM commentaires AS com
                INNER JOIN article AS art
                ON com.id_article = art.id_article";
        $getReport = $this->executeRequest($sql)->fetchAll();
        return $getReport;
    }

    public function deleteComm($idComm){
        $sql = "DELETE FROM commentaires WHERE id_comm = ?";
        $deleteComm= $this->executeRequest($sql, array($idComm));
        return $deleteComm;
    }

}