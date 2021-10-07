<?php
namespace App;

use \PDO;

class CommentManager extends Manager{
    public function getcomments($postId){
        $statement = "SELECT id, author, comment, DATE_FORMAT(comment_date,'%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE post_id=? ORDER BY comment_date DESC";
        $comments = $this->dbConnect()->prepare($statement);
        $comments->execute([$postId]);
        $datas = $comments->fetchall(PDO::FETCH_OBJ);
        $comments->closeCursor();
        return $datas;
    }
}