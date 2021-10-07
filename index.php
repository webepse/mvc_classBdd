<?php
namespace App;
require('controller/HomeController.php');

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
        }
    }else{
        // controller
    }
}else{
    // controller
    HomeController::listPosts();
}