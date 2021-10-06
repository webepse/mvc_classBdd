<?php
namespace App;

require('model/autoloader.php');
Autoloader::register();

class HomeController{
    public static function listPosts()
    {
        $postManager = new PostManager(); // création de l'objet
        $posts = $postManager->getPosts(); // appel d'une fonction de cet objet pour récup les posts 

        require("view/frontend/listPostsView.php");
    }
}