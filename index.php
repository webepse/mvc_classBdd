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
        }else{
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