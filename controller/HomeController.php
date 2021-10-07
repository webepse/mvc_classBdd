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
        $post = $postManager->getPost($postId);

        require('view/frontend/postView.php');
    }
}