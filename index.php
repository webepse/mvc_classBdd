<?php
namespace App;
require('controller/HomeController.php');

if(isset($_GET['action']))
{
    if($_GET['action']=="listPost")
    {
        // controller
        HomeController::listPosts();
    }else{
        // controller
    }
}else{
    // controller
    HomeController::listPosts();
}