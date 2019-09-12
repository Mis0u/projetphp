<?php

namespace Src\Model;

class CommentsModel extends Model{

    public function getComments($id_article, $firstEntry , $msgByPage){
        $sql = "SELECT id_comm,content, DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%i') as date_comm,author FROM commentaires WHERE id_article = ? ORDER BY id_comm DESC LIMIT $firstEntry,$msgByPage";
        $comments = $this->executeRequest($sql, array($id_article))->fetchAll();
        return $comments;
    }

    public function countComments($id_article){
        $sql = "SELECT COUNT(*) as nbcomm FROM commentaires WHERE id_article = ?";
        $totalComm = $this->executeRequest($sql, [$id_article])->fetch();
        return $totalComm['nbcomm'];
    }

}