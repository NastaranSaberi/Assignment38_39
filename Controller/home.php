<?php

    include "Model/database.php"; 
    include "Controller/functions.php";


   

    $user = $db->query("SELECT * FROM users WHERE id = $user_id_follow")->fetch_assoc();
    $user_id_follow = $_SESSION["user_id_follow"];

    $user_id = $_SESSION["user_id"];


    $posts = $db->query("SELECT *, users.id AS id_karbar, posts.id AS id_post FROM
                        users INNER JOIN posts
                        ON users.id = posts.user_id
                        ORDER BY time DESC;");

    
    $posts_array = array();

    // $postha = $db->query("SELECT * FROM posts;");

    // $comments = $db->query("SELECT * FROM comments INNER JOIN users ON comments.user_id = users.id;");

    foreach($posts as $post)
    {
        $post_id = $post["id_post"];

        $post["likes"] = $db->query("SELECT COUNT(*) AS count FROM likes WHERE post_id = $post_id")->fetch_assoc();

        $post["like_user"]  = $db->query("SELECT * FROM likes WHERE post_id = $post_id AND user_id = $user_id")->num_rows;

        $post["comments"] = $db->query("SELECT * FROM
                                        comments INNER JOIN users 
                                        ON comments.user_id = users.id
                                        WHERE post_id = $post_id
                                        ORDER BY time DESC");



        $posts_array[] = $post;
        
    }

    
   

    require "View/home.php";

?>
