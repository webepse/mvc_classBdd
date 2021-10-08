<?php
namespace App;

require('model/Autoloader.php');
Autoloader::register();

class HomeController{
    public static function listPosts()
    {
        $postManager = new PostManager(); // création de l'objet
        $posts = $postManager->getPosts(5,0); // appel d'une fonction de cet objet pour récup les posts 

        require("view/frontend/listPostsView.php");
    }

    public static function post($postId)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        require('view/frontend/postView.php');
    }
    
    public static function comment($id)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->getComment($id);
        require("view/frontend/commentView.php");
    }

    public static function addComment($postId,$author,$comment)
    {
        $err=0;
        if(empty($comment))
        {
            $err=1;
        }else{
            $comment = htmlspecialchars($comment);
        }
        if(empty($postId))
        {
            $err=2;
        }
        if(empty($author))
        {
            $err=3;
        }
        if($err==0)
        {
            $commentManager = new CommentManager();
            $affectedLines = $commentManager->postComment($postId,$author,$comment);
            if($affectedLines === false){
                throw new \Exception('Impossible d\'ajouter le commentaire !');
            }else{
                header("LOCATION:index.php?action=post&id=".$postId);
            }
        }else{
            header("LOCATION:index.php?action=post&id=".$postId."&err=".$err);
        }
        
    }

    public static function updateComment($commentId, $comment, $postId, $author)
    {
        $err=0;
        if(empty($comment))
        {
            $err=1;
        }else{
            $comment = htmlspecialchars($comment);
        }
        if(empty($postId))
        {
            $err=2;
        }
        if(empty($author))
        {
            $err=3;
        }
        if($err==0)
        {
            $commentManager = new CommentManager();
            $affectedLines = $commentManager->updateComment($commentId,$comment,$author);
            if($affectedLines === false){
                throw new \Exception('Impossible de modifier le commentaire');
            }else{
                header("LOCATION:index.php?action=post&id=".$postId);
            }


        }else{
            header("LOCATION:index.php?action=comment&id=".$commentId."&err=".$err);
        }
    }

    public static function forbidden()
    {
        require("view/frontend/forbiddenView.php");
    }
}