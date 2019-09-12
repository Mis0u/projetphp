<?php

namespace Model;
use Src\Model\Model;

class Post extends Model{

    public function postComm(){
        $sql = "INSERT into commentaires (author,content,DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%i')) WHERE id_article = ? ";
        $newComm = $this->executeRequest($sql, array($id_article))->fetch();
        return $newComm ;
    }
}