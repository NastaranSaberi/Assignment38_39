<?php

    include "Model/database.php";

    $user_id = $_SESSION["user_id"];
    $post_id = $_POST["post_id"];
  
    $number_of_like =$db->query("SELECT * FROM likes WHERE post_id=$post_id AND user_id=$user_id")->num_rows;

    if($number_of_like == 0)
    {
        $db->query("INSERT INTO likes(user_id,post_id) VALUES($user_id,$post_id)");
        echo 1;
    }
    else{
        $db->query("DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");
        echo 0;
    }


  
?>