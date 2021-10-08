<?php
namespace App;
require('controller/HomeController.php');
try{
    if(isset($_GET['action']))
    {
        if($_GET['action']=="listPost")
        {
            // controller
            HomeController::listPosts();
        }elseif($_GET['action']=="post")
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                HomeController::post($_GET['id']);
            }else{
                // error 
                throw new \Exception('Aucun identifiant d\'article à été donné');
            }
        }elseif($_GET['action']=="comment"){
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                $commentId=htmlspecialchars($_GET['id']);
                HomeController::comment($commentId);
            }else{
                throw new \Exception('Aucun identifiant de commentaire envoyé');
            }
        }elseif($_GET['action']=="addcomment")
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                if(isset($_POST['commentaire']) AND isset($_POST['author']))
                {
                   HomeController::addComment($_GET['id'],$_POST['author'],$_POST['commentaire']); 
                }else{
                    HomeController::forbidden();
                }
            }
        }
        elseif($_GET['action']=="upcomment")
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                if(isset($_POST['commentaire']) AND isset($_POST['postid']) AND isset($_POST['author']))
                {
                    HomeController::updateComment($_GET['id'],$_POST['commentaire'],$_POST['postid'],$_POST['author']); 
                }else{
                    HomeController::forbidden();
                }
            }else{
                throw new \Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        else{
            throw new \Exception('La page : <strong>'.$_GET['action'].'</strong> n\'existe pas');
        }
    }else{
        // controller
        HomeController::listPosts();
    }
}catch(\Exception $e){
    $errorMessage = $e->getMessage();
    require("view/frontend/errorView.php");
}