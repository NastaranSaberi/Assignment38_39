<?php

session_start();

date_default_timezone_set("Asia/tehran");
$request = $_SERVER["REQUEST_URI"];
$request = str_replace("/SocialNetwork", "", $request);


switch ($request)
{
    case ("/"):
    case ("/index"):
    case ("/index.php"):
    case ("index"):
        require "Controller/index.php";
        break;

    case ("/home.php/"):
    case ("/home.php"):
    case("/home"):
    case ("/home"):

        if($_SESSION["login_status"] == true)
        {
            require "Controller/home.php";
            break;
        }
        else
        {
            require "Controller/index.php";
            break;        
         
        }

    case ("/profile.php/"):
    case ("/profile.php"):
    case("/profile"):
        require "Controller/profile.php";
        break;

    case ("/register.php/"):
    case ("/register.php"):
    case("/register"):
        require "Controller/register.php";
        break;

    case ("/register_process.php/"):
    case ("/register_process.php"):
    case("/register_process"):
        require "Controller/register_process.php";
        break;

    case ("/login_process.php/"):
    case ("/login_process.php"):
    case("/login_process"):
        require "Controller/login_process.php";
        break;

    case ("/post_process.php/"):
    case ("/post_process.php"):
    case("/post_process"):
        require "Controller/post_process.php";
        break;

    case ("/add_comment.php/"):
    case ("/add_comment.php"):
    case("/add_comment"):
        require "Controller/add_comment.php";
        break;

    case ("/logout_process.php/"):
    case ("/logout_process.php"):
    case ("/logout_process"):
        require "Controller/logout_process.php";
        break;

    case ("/send_comment.php/"):
    case ("/send_comment.php"):
    case ("/send_comment"):
        require "Controller/send_comment.php";
        break;

    case ("/send_like.php/"):
    case ("/send_like.php"):
    case ("/send_like"):
        require "Controller/send_like.php";
        break;

    case ("/remove_post.php/"):
    case ("/remove_post.php"):
    case ("/remove_post"):
        require "Controller/remove_post.php";
        break;

    case ("/edit_post.php/"):
    case ("/edit_post.php"):
    case ("/edit_post"):
        require "Controller/edit_post.php";
        break;
        
    default:
        require "Controller/404.php";
        break;
}

?>