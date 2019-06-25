<?php 

require "model/Model.php";

class CommModel extends Model{

    public function getComm($id_article){
        $sql="SELECT id_comm, id_article, content, DATE_FORMAT(date_comm, '%d/%m/%Y à %Hh%imin%ss') as date_comm, author FROM commentaires WHERE id_article = ?";
        $comments = $this->executeRequest($sql, array($id_article));
        return $comments;
    }

}