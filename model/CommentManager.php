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

    public function getComment($commentId)
    {
        $statement = "SELECT id, author, comment, post_id, DATE_FORMAT(comment_date,'%d/%m/%Y à %Hh%imin%ss') as comment_date_fr FROM comments WHERE id=?";
        $comment = $this->dbConnect()->prepare($statement);
        $comment->execute([$commentId]);
        $comment->setFetchMode(PDO::FETCH_OBJ);
        $data = $comment->fetch();
        $comment->closeCursor();
        return $data;
    }

    public function postComment($postId, $author, $comment)
    {
        $statement = "INSERT INTO comments(post_id,author,comment,comment_date) VALUES(:myid,:auteur,:comment,NOW())";
        $insert = $this->dbConnect()->prepare($statement);
        $affectedLines = $insert->execute([
            "myid"=>$postId,
            "auteur"=>$author,
            "comment"=>$comment
        ]);
        $insert->closeCursor();
        return $affectedLines;
    }


    public function updateComment($commentId, $comment, $author)
    {
        $statement = "UPDATE comments SET comment=:comment, author=:author WHERE id=:myid";
        $comments = $this->dbConnect()->prepare($statement);
        $affectedCom = $comments->execute([
            "comment"=>$comment,
            "author"=>$author,
            "myid"=>$commentId
        ]);
        $comments->closeCursor();
        return $affectedCom;
    }

}