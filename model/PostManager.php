<?php
namespace App;
use \PDO;

class PostManager extends Manager{
    public function getPosts($limit=null, $offset=null){

        if(is_null($limit))
        {
            $statement="SELECT id,title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,5";
        }else{
            if(is_null($offset))
            {
                $statement="SELECT id,title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT ".$limit;
            }else{
                $statement="SELECT id,title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT ".$offset.",".$limit;
            }
        }

        $req = $this->dbConnect()->query($statement);
        $datas = $req->fetchall(PDO::FETCH_CLASS,'App\Post');
        $req->closeCursor();
        return $datas;
    }

    public function getPost($postId)
    {
        $statement = "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts WHERE id = ?";
        $req = $this->dbConnect()->prepare($statement);
        $req->execute([$postId]);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $data = $req->fetch();
        $req->closeCursor();
        return $data;
    }
    

}
